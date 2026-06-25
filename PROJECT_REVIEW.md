# Project Review Notes

## Current direction

This version keeps the **List Your Business / Register Business** buttons, but does not develop the business registration feature in this module. That flow is treated as a separate part of the project.

The main focus of this module is:

1. Demo business data for testing.
2. Business search and filtering.
3. Business profile pages.
4. Quote request flow.
5. Footer navigation links going to real pages or sections.

## Implemented in this version

### Business demo data

`config/demo-businesses.php` now contains richer fake business data, including:

- business name
- industry
- category
- location
- service areas
- description
- service list
- tags for search
- phone and email
- rating
- demo jobs completed
- response time

This is enough for search/filter testing without building the real business database yet.

### Search and filters

The business listing page supports:

- service keyword search
- location/suburb search
- industry filter
- category filter
- quick filter buttons for common searches

The search checks business name, industry, category, description, services, and tags. Location search checks both the main location and service areas.

### Quote flow

The quote flow includes:

- `/quote` form
- quote buttons from business cards
- quote buttons from profile pages
- pre-filled business, service, and location query parameters
- matching demo business suggestions on the quote page
- validation
- saving to `quote_requests` table after migrations are run
- confirmation page with reference number

### Footer navigation

A reusable footer partial has been added at:

`resources/views/partials/footer.blade.php`

Footer links now point to real pages or filters:

- Electricians
- Plumbers
- Builders
- Cleaners
- Get Quotes
- How it Works
- Browse Businesses
- List Your Business
- Receive Leads
- Pricing
- About
- Contact
- Privacy Policy

## Kept but not implemented here

### List Your Business / Register Business

The buttons are still visible in the navbar, homepage, and footer.

However, `/businesses/register` is now a placeholder page explaining that this feature is handled separately. No business registration data is saved by this module.

## Still not implemented

These would be later development tasks:

- real business database table
- real business registration flow
- admin dashboard to view quote requests and contact messages
- authentication/login
- email notifications
- API connection to Tradie Assist or another backend
- quote matching workflow after a customer submits a request
