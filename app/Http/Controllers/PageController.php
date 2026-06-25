<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function show(string $page)
    {
        if (in_array($page, ['about', 'privacy'], true)) {
            return redirect()->route('home');
        }

        if ($page === 'contact') {
            return redirect()->route('contact.create');
        }

        $pages = [
            'pricing' => [
                'title' => 'Pricing',
                'heading' => 'Simple business listing options',
                'body' => 'Business listing and lead management options can be shown here when the business-facing module is connected.',
            ],
            'receive-leads' => [
                'title' => 'Receive Leads',
                'heading' => 'Receive customer job requests',
                'body' => 'Businesses can list their services and receive customer quote requests through the business-facing part of the platform.',
            ],
        ];

        abort_if(! array_key_exists($page, $pages), 404);

        return view('static.page', $pages[$page]);
    }
}
