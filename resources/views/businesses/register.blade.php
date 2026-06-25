<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trady App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/business.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <script src="{{ asset('js/business.js') }}" defer></script>
</head>
<body>
    @include('partials.header')

    <main class="service-request-page">
        <div class="container">
            <section class="service-request">
                <aside class="service-request__sidebar">
                    <div class="sidebar-heading">
                        <h3>Tradesperson Registration</h3>
                        <span>Complete all steps to get listed</span>
                    </div>
                    <ol class="step-list">
                        <li class="step-list__item step-list__item--active" data-step="1">
                            <div class="step-list__number">
                                <span>1</span>
                            </div>
                            <div class="step-list__content">
                                <h2>Account Details</h2>
                                <p>Login + Contact</p>
                            </div>
                        </li>

                        <li class="step-list__item" data-step="2">
                            <div class="step-list__number">
                                <span>2</span>
                            </div>
                            <div class="step-list__content">
                                <h2>Business Info</h2>
                                <p>Name & Address</p>
                            </div>
                        </li>

                        <li class="step-list__item" data-step="3">
                            <div class="step-list__number">
                                <span>3</span>
                            </div>
                            <div class="step-list__content">
                                <h2>Industry & Services</h2>
                                <p>What you offer</p>
                            </div>
                        </li>

                        <li class="step-list__item" data-step="4">
                            <div class="step-list__number">
                                <span>4</span>
                            </div>
                            <div class="step-list__content">
                                <h2>Service Areas</h2>
                                <p>Where you work</p>
                            </div>
                        </li>

                        <li class="step-list__item" data-step="5">
                            <div class="step-list__number">
                                <span>5</span>
                            </div>
                            <div class="step-list__content">
                                <h2>Business Profile</h2>
                                <p>Profile quality</p>
                            </div>
                        </li>

                        <li class="step-list__item" data-step="6">
                            <div class="step-list__number">
                                <span>6</span>
                            </div>
                            <div class="step-list__content">
                                <h2>Verification</h2>
                                <p>Trust &amp; Safety</p>
                            </div>
                        </li>
                    </ol>
                </aside>

                <div class="service-request__main">
                    <div class="form-heading">
                        <span class="form-heading__eyebrow">Step 1 of 6</span>
                        <h2>Account Details</h2>
                        <p>Create your login credentials and primary contact information.</p>
                    </div>

                    <div class="step-progress">
                        <span class="step-progress__bar step-progress__bar--active"></span>
                        <span class="step-progress__bar"></span>
                        <span class="step-progress__bar"></span>
                        <span class="step-progress__bar"></span>
                        <span class="step-progress__bar"></span>
                        <span class="step-progress__bar"></span>
                        <span class="step-progress__label">Step 1 of 6</span>
                    </div>

                    <form class="service-request-form" action="#" method="post" novalidate>
                        <div class="form-step form-step--active" data-step="1" data-title="Account Details" data-description="Create your login credentials and primary contact information.">
                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        First Name
                                        <span class="required">*</span>
                                    <input type="text" name="FirstName" placeholder="First Name" required>
                                    <span class="field-error"></span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Last Name
                                        <span class="required">*</span>
                                    <input type="text" name="LastName" placeholder="Last Name" required>
                                    <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        Email
                                        <span class="required">*</span>
                                        <input type="email" name="Email" placeholder="Enter your email" title="Enter valid email address" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        Phone Number
                                        <span class="required">*</span>
                                        <input type="tel" name="PhoneNumber" placeholder="Enter your phone number" title="Enter valid phone number" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Password
                                        <span class="required">*</span>
                                        <input type="password" name="password" placeholder="Enter password" autocomplete="new-password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9\s])\S{8,}" title="Minimum 8 characters with uppercase, lowercase, number and symbol" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Confirm Password
                                        <span class="required">*</span>
                                        <input type="password" name="confirmPassword" placeholder="Confirm password" autocomplete="new-password" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label class="checkbox">
                                        <input type="checkbox" name="accountTermsConditions" required>
                                        <span>I agree to the Terms &amp; Conditions and Privacy Policy <span class="required">*</span></span>
                                    </label>
                                    <span class="field-error"></span>
                                </div>
                            </div>
                            <div class="form-row form-row--full">
                                <button type="button" class="submit-button" data-next-step="2">Continue to Business Details →</button>
                            </div>
                            <div class="form-row form-row--full">
                                <div class="privacy-text">
                                    <span>🔒 Your information is encrypted and secure. We never share your data without consent.</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-step" data-step="2" data-title="Business Information" data-description="Tell us about your business so customers can find and trust you.">
                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        Business details
                                        <span class="required">*</span>
                                        <input type="text" name="BusinessName" placeholder="e.g. Mitchell Plumbing Ltd" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        NZBN
                                        <span class="required">*</span>
                                        <input type="text" name="NZBN" inputmode="numeric" autocomplete="off"
                                            pattern="[0-9]{13}" maxlength="13" placeholder="e.g. 9429000000000"
                                            title="Enter a valid 13 digit NZBN number" required>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        Business Address
                                        <span class="required">*</span>
                                        <input type="text" name="BusinessAddress" placeholder="Street address, suburb, city" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <fieldset class="business-type">
                                    <legend>
                                        Business Type
                                        <span>Optional</span>
                                    </legend>
                                    <div class="business-type__options">
                                        <label class="business-type__option">
                                            <input type="radio" name="businessType" value="individual" checked>
                                            <span>
                                                <strong>Individual / Sole Trader</strong>
                                                <small>You operate as an individual</small>
                                            </span>
                                        </label>
                                        <label class="business-type__option">
                                            <input type="radio" name="businessType" value="company">
                                            <span>
                                                <strong>Company / Business</strong>
                                                <small>Registered business or company</small>
                                            </span>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="form-row">
                                <button type="button" class="back-button" data-back-step="1">← Back</button>
                                <button type="button" class="submit-button" data-next-step="3">Continue to Industry & Services →</button>
                            </div>
                        </div>

                        <div class="form-step" data-step="3" data-title="Industry & Services" data-description="Tell customers what type of work you offer.">
                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Industry Category
                                        <span class="required">*</span>
                                        <select name="industryCategory" required>
                                            <option value="" selected disabled>Select industry category</option>
                                            <option value="plumbing">Plumbing</option>
                                            <option value="electrical">Electrical</option>
                                            <option value="painting">Painting</option>
                                            <option value="roofing">Roofing</option>
                                            <option value="hvac">HVAC</option>
                                            <option value="landscaping">Landscaping</option>
                                            <option value="building-construction">Building / Construction</option>
                                            <option value="handyman-services">Handyman Services</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Primary Service
                                        <span class="required">*</span>
                                        <select name="primaryService" required>
                                            <option value="" selected disabled>Select primary service</option>
                                            <option value="repairs-maintenance">Repairs &amp; Maintenance</option>
                                            <option value="installation">Installation</option>
                                            <option value="renovation">Renovation</option>
                                            <option value="inspection">Inspection</option>
                                            <option value="emergency-service">Emergency Service</option>
                                            <option value="general-service">General Service</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Years of Experience
                                        <span class="required">*</span>
                                        <select name="yearsOfExperience" required>
                                            <option value="" selected disabled>Select years of experience</option>
                                            <option value="0-1">0–1 Years</option>
                                            <option value="2-5">2–5 Years</option>
                                            <option value="5-10">5–10 Years</option>
                                            <option value="10-plus">10+ Years</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Team Size
                                        <select name="teamSize">
                                            <option value="" selected disabled>Select team size</option>
                                            <option value="just-me">Just Me</option>
                                            <option value="2-5">2–5 People</option>
                                            <option value="6-10">6–10 People</option>
                                            <option value="10-plus">10+ People</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Availability
                                        <span class="required">*</span>
                                        <select name="availability" required>
                                            <option value="" selected disabled>Select availability</option>
                                            <option value="weekdays">Weekdays</option>
                                            <option value="weekends">Weekends</option>
                                            <option value="emergency">24/7 Emergency</option>
                                            <option value="flexible">Flexible</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                                <fieldset class="service-choice">
                                    <legend>Emergency Services</legend>
                                    <div class="service-choice__options">
                                        <label class="service-choice__option">
                                            <input type="radio" name="emergencyServices" value="yes">
                                            <span>Yes</span>
                                        </label>
                                        <label class="service-choice__option">
                                            <input type="radio" name="emergencyServices" value="no">
                                            <span>No</span>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        Service Description
                                        <span class="required">*</span>
                                        <textarea name="serviceDescription" placeholder="Describe your services, specialties, and experience..." required></textarea>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <button type="button" class="back-button" data-back-step="2">← Back</button>
                                <button type="button" class="submit-button" data-next-step="4">Continue to Service Areas →</button>
                            </div>
                        </div>

                        <div class="form-step" data-step="4" data-title="Service Areas" data-description="Tell customers where you provide your services.">
                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Primary Service Location
                                        <span class="required">*</span>
                                        <input type="text" name="primaryServiceLocation" placeholder="e.g. Auckland Central" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Travel Distance
                                        <span class="required">*</span>
                                        <select name="travelDistance" required>
                                            <option value="" selected disabled>Select travel distance</option>
                                            <option value="5-km">5 km</option>
                                            <option value="10-km">10 km</option>
                                            <option value="25-km">25 km</option>
                                            <option value="50-km">50 km</option>
                                            <option value="100-km">100 km</option>
                                            <option value="nationwide">Nationwide</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field areas-served">
                                    <label>
                                        Areas Served
                                        <span class="required">*</span>
                                        <input class="areas-served__input" type="text" name="areasServed" placeholder="Select areas served" autocomplete="off" aria-haspopup="true" aria-expanded="false" required>
                                        <span class="field-error"></span>
                                    </label>
                                    <div class="areas-served__tags" aria-live="polite"></div>
                                    <div class="areas-served__menu" role="group" aria-label="Areas served options">
                                        <label><input type="checkbox" value="Auckland Central"><span>Auckland Central</span></label>
                                        <label><input type="checkbox" value="North Shore"><span>North Shore</span></label>
                                        <label><input type="checkbox" value="West Auckland"><span>West Auckland</span></label>
                                        <label><input type="checkbox" value="South Auckland"><span>South Auckland</span></label>
                                        <label><input type="checkbox" value="East Auckland"><span>East Auckland</span></label>
                                        <label><input type="checkbox" value="Manukau"><span>Manukau</span></label>
                                        <label><input type="checkbox" value="Henderson"><span>Henderson</span></label>
                                        <label><input type="checkbox" value="Papakura"><span>Papakura</span></label>
                                        <label><input type="checkbox" value="Albany"><span>Albany</span></label>
                                        <label><input type="checkbox" value="Mount Eden"><span>Mount Eden</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Service Type
                                        <span class="required">*</span>
                                        <select name="serviceType" required>
                                            <option value="" selected disabled>Select service type</option>
                                            <option value="onsite-only">On-site Only</option>
                                            <option value="remote-only">Remote Only</option>
                                            <option value="both">Both On-site and Remote</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Travel Charges
                                        <select name="travelCharges">
                                            <option value="" selected disabled>Select travel charges</option>
                                            <option value="no-charge">No Travel Charge</option>
                                            <option value="charge-applies">Travel Charge Applies</option>
                                            <option value="depends-on-distance">Depends on Distance</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        Additional Location Notes
                                        <textarea name="additionalLocationNotes" placeholder="Add any notes about travel limits, suburbs covered, or special location conditions..."></textarea>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <button type="button" class="back-button" data-back-step="3">← Back</button>
                                <button type="button" class="submit-button" data-next-step="5">Continue to Business Profile →</button>
                            </div>
                        </div>

                        <div class="form-step" data-step="5" data-title="Business Profile" data-description="Build your public business profile so customers can trust and hire you.">
                            <div class="form-row">
                                <div class="form-field">
                                    <span class="profile-upload__label">Business Logo</span>
                                    <label class="profile-upload">
                                        <input type="file" name="businessLogo" accept="image/jpeg,image/png,image/webp" aria-label="Business Logo">
                                        <span class="profile-upload__content">
                                            <img class="profile-upload__preview" alt="Business logo preview" hidden>
                                            <span class="profile-upload__title">Drop image here or browse</span>
                                            <span class="profile-upload__hint">JPG, PNG or WEBP</span>
                                        </span>
                                    </label>
                                    <span class="profile-upload__error" aria-live="polite"></span>
                                </div>
                                <div class="form-field">
                                    <span class="profile-upload__label">Cover Photo</span>
                                    <label class="profile-upload">
                                        <input type="file" name="coverPhoto" accept="image/jpeg,image/png,image/webp" aria-label="Cover Photo">
                                        <span class="profile-upload__content">
                                            <img class="profile-upload__preview" alt="Cover photo preview" hidden>
                                            <span class="profile-upload__title">Drop image here or browse</span>
                                            <span class="profile-upload__hint">JPG, PNG or WEBP</span>
                                        </span>
                                    </label>
                                    <span class="profile-upload__error" aria-live="polite"></span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Business Tagline
                                        <span class="required">*</span>
                                        <input type="text" name="businessTagline" placeholder="e.g. Reliable Auckland Plumbing Experts" required>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Years in Business
                                        <span class="required">*</span>
                                        <select name="yearsInBusiness" required>
                                            <option value="" selected disabled>Select years in business</option>
                                            <option value="less-than-1">Less than 1 Year</option>
                                            <option value="1-2">1–2 Years</option>
                                            <option value="3-5">3–5 Years</option>
                                            <option value="5-10">5–10 Years</option>
                                            <option value="10-plus">10+ Years</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        About Your Business
                                        <span class="required">*</span>
                                        <textarea name="aboutBusiness" placeholder="Tell customers about your experience, specialties, work quality, and why they should hire you..." data-character-count required></textarea>
                                        <span class="field-error"></span>
                                        <span class="character-count"><span>0</span> characters</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Website URL
                                        <input type="url" name="websiteUrl" placeholder="https://yourwebsite.com">
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Social Media URL
                                        <input type="url" name="socialMediaUrl" placeholder="https://facebook.com/yourbusiness">
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label>
                                        Certifications / Licenses
                                        <textarea name="certificationsLicenses" placeholder="List any certifications, licenses, or qualifications..." data-character-count></textarea>
                                        <span class="character-count"><span>0</span> characters</span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label>
                                        Insurance Status
                                        <span class="required">*</span>
                                        <select name="insuranceStatus" required>
                                            <option value="" selected disabled>Select insurance status</option>
                                            <option value="fully-insured">Fully Insured</option>
                                            <option value="public-liability">Public Liability Insurance</option>
                                            <option value="no-insurance">No Insurance</option>
                                        </select>
                                        <span class="field-error"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <label class="profile-toggle">
                                    <input type="checkbox" name="profileVisibility">
                                    <span class="profile-toggle__control"></span>
                                    <span>Make my profile publicly visible to customers</span>
                                </label>
                            </div>

                            <div class="form-row">
                                <button type="button" class="back-button" data-back-step="4">← Back</button>
                                <button type="button" class="submit-button" data-next-step="6">Continue to Verification →</button>
                            </div>
                        </div>

                        <div class="form-step" data-step="6" data-title="Verification" data-description="Verify your business and identity to build customer trust and platform safety.">
                            <div class="form-row">
                                <div class="form-field">
                                    <span class="verification-upload__label">
                                        Government ID Upload
                                        <span class="required">*</span>
                                    </span>
                                    <label class="verification-upload">
                                        <input type="file" name="governmentId" accept="application/pdf,image/jpeg,image/png" aria-label="Government ID Upload" required>
                                        <span class="verification-upload__content">
                                            <img class="verification-upload__preview" alt="Government ID preview" hidden>
                                            <span class="verification-upload__title">Drop file here or browse</span>
                                            <span class="verification-upload__description">Upload a valid passport, driver license, or national ID.</span>
                                            <span class="verification-upload__hint">PDF, JPG or PNG</span>
                                            <span class="verification-upload__success" hidden></span>
                                        </span>
                                    </label>
                                    <span class="field-error"></span>
                                </div>
                                <div class="form-field">
                                    <span class="verification-upload__label">Trade License / Certification Upload</span>
                                    <label class="verification-upload">
                                        <input type="file" name="tradeLicense" accept="application/pdf,image/jpeg,image/png" aria-label="Trade License or Certification Upload">
                                        <span class="verification-upload__content">
                                            <img class="verification-upload__preview" alt="Trade license preview" hidden>
                                            <span class="verification-upload__title">Drop file here or browse</span>
                                            <span class="verification-upload__description">Upload any trade license or qualification certificates.</span>
                                            <span class="verification-upload__hint">PDF, JPG or PNG</span>
                                            <span class="verification-upload__success" hidden></span>
                                        </span>
                                    </label>
                                    <span class="verification-upload__error" aria-live="polite"></span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label class="verification-check">
                                        <input type="checkbox" name="nzbnVerification">
                                        <span class="verification-check__box"></span>
                                        <span>I confirm my NZBN information is accurate</span>
                                    </label>
                                </div>
                                <div class="form-field">
                                    <label class="verification-check">
                                        <input type="checkbox" name="insuranceConfirmation" required>
                                        <span class="verification-check__box"></span>
                                        <span>I confirm my insurance details are valid and up to date <span class="required">*</span></span>
                                    </label>
                                    <span class="field-error"></span>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label class="verification-check">
                                        <input type="checkbox" name="backgroundCheckConsent" required>
                                        <span class="verification-check__box"></span>
                                        <span>I agree to background and identity verification checks <span class="required">*</span></span>
                                    </label>
                                    <span class="field-error"></span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-field">
                                    <label class="verification-check">
                                        <input type="checkbox" name="termsConditions" required>
                                        <span class="verification-check__box"></span>
                                        <span>I agree to the Terms &amp; Conditions and Privacy Policy <span class="required">*</span></span>
                                    </label>
                                    <span class="field-error"></span>
                                </div>
                                <div class="form-field">
                                    <label class="verification-check">
                                        <input type="checkbox" name="marketingPreferences">
                                        <span class="verification-check__box"></span>
                                        <span>I want to receive platform updates and promotional emails</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row form-row--full">
                                <div class="form-field">
                                    <label>
                                        Additional Verification Notes
                                        <textarea name="additionalVerificationNotes" placeholder="Add any extra information regarding licenses, certifications, or verification..."></textarea>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <button type="button" class="back-button" data-back-step="5">← Back</button>
                                <button type="submit" class="submit-button">Complete Registration →</button>
                            </div>
                            <div class="registration-success" role="status" aria-live="polite" hidden>
                                <span class="registration-success__check">✓</span>
                                <strong>Registration submitted successfully</strong>
                                <span>Your verification details are ready for review.</span>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
