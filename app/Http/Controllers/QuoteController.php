<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
    public function create(Request $request)
    {
        $business = trim((string) $request->query('business', ''));
        $service = trim((string) $request->query('service', ''));
        $location = trim((string) $request->query('location', ''));

        if ($business === '' && ! $request->old('preferred_business')) {
            return redirect()->route('businesses.index');
        }

        $businesses = collect(config('demo-businesses'))->values();
        $selectedBusinessName = old('preferred_business', $business);

        $selectedBusiness = $businesses->first(function ($item) use ($selectedBusinessName) {
            return $item['name'] === $selectedBusinessName;
        });

        return view('quotes.create', [
            'business' => $selectedBusinessName,
            'service' => old('service', $service ?: ($selectedBusiness['category'] ?? '')),
            'location' => old('location', $location ?: ($selectedBusiness['location'] ?? '')),
            'industries' => config('industries'),
            'businesses' => $businesses,
            'selectedBusiness' => $selectedBusiness,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'customer_name' => ['required', 'string', 'max:120'],
                'email' => ['required', 'email', 'max:120'],
                'phone' => ['required', 'string', 'max:40', 'regex:/^(?=(?:.*\d){7,})[\d\s+()\-]+$/'],
                'service' => ['required', 'string', 'max:120'],
                'location' => ['required', 'string', 'max:120'],
                'preferred_business' => ['required', 'string', 'max:120'],
                'description' => ['required', 'string', 'max:1500'],
                'budget' => ['nullable', 'string', 'max:80'],
            ],
            [
                'email.required' => 'Required',
                'email.email' => 'Enter valid email address',
                'phone.required' => 'Required',
                'phone.regex' => 'Enter valid phone number',
            ]
        );

        $quoteRequest = QuoteRequest::create($data);

        return view('static.submitted', [
            'title' => 'Quote request submitted',
            'message' => 'Thank you, ' . $quoteRequest->customer_name . '. Your quote request has been submitted. Reference number: QR-' . str_pad((string) $quoteRequest->id, 5, '0', STR_PAD_LEFT) . '.',
        ]);
    }

    private function searchBusiness(array $business, string $term, array $fields): bool
    {
        $haystack = collect($fields)
            ->flatMap(function ($field) use ($business) {
                $value = $business[$field] ?? '';

                return is_array($value) ? $value : [$value];
            })
            ->implode(' ');

        return str_contains(Str::lower($haystack), Str::lower($term));
    }
}
