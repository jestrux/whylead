@php
    $_formOptions = \Statamic\Facades\GlobalSet::find('form_options')->inCurrentSite();
    $fields = [
        ['label' => 'First Name', 'name' => 'firstname', 'width' => 'half'],
        ['label' => 'Last Name', 'name' => 'lastname', 'width' => 'half', 'required' => false],
        ['label' => 'Work Email', 'name' => 'email', 'type' => 'email', 'width' => 'half'],
        ['label' => 'Phone Number', 'name' => 'phone', 'width' => 'half'],
        [
            'label' => 'I am interested with the program for',
            'name' => 'i_am_interested_with_the_program_for',
            'required' => false,
            'width' => 'half',
            'type' => 'select',
            'meta' => ['choices' => $_formOptions->get('program_interest') ?? []],
        ],
        ['label' => 'Company Name', 'name' => 'company', 'width' => 'half'],
        ['type' => 'number', 'label' => 'Expected Participant Count', 'name' => 'expected_participant_count', 'required' => false, 'width' => 'half'],
        [
            'label' => 'Select Country',
            'name' => 'select_country',
            'required' => false,
            'width' => 'half',
            'type' => 'select',
            'meta' => ['choices' => $countries],
        ],
        ['label' => "What's your job Title?", 'name' => 'jobtitle', 'width' => 'half'],
        [
            'label' => 'Total Years of Professional Experience',
            'name' => 'total_years_of_professional_experience',
            'width' => 'half',
            'type' => 'select',
            'meta' => ['choices' => $_formOptions->get('experience_brackets') ?? []],
        ],
        [
            'label' => 'Are you managing a team?',
            'name' => 'are_you_managing_a_team',
            'width' => 'half',
            'type' => 'radio',
            'meta' => ['choices' => $_formOptions->get('boolean_choices') ?? []],
        ],
        [
            'label' => 'What is the size of your team?',
            'name' => 'what_is_the_size_of_your_team',
            'width' => 'half',
            'type' => 'select',
            'meta' => ['choices' => $_formOptions->get('team_sizes') ?? []],
        ],
        ['label' => 'Preferred Cohort', 'name' => 'cohort', 'width' => 'half', 'required' => false],
        [
            'label' => 'How did you hear about us?',
            'name' => 'how_did_you_hear_about_us_',
            'width' => 'half',
            'type' => 'select',
            'meta' => ['choices' => $_formOptions->get('discovery_channels') ?? []],
        ],
        [
            'label' => 'What format of the Thrive in the Middle are you considering?',
            'name' => 'what_format_of_the_thrive_in_the_middle_are_you_considering_',
            'width' => 'full',
            'type' => 'radio',
            'required' => false,
            'meta' => ['choices' => $_formOptions->get('program_formats') ?? []],
        ],
    ];

    $values = [
        'Preferred Cohort' => $_GET['cohort'] ?? null,
    ];
@endphp

<section class="pt-6 pb-12">
    <div class="max-w-4xl px-4 lg:px-8 mx-auto">
        <x-dynamic-form :$fields :$values on-save="enroll"
            success-message="We've received your message, we'll get back to you." />

        <script>
            function enroll(data, el) {
                const payload = {
                    fields: Object.keys(data).map(field => {
                        return {
                            "objectTypeId": "0-1",
                            "name": field,
                            "value": data[field]
                        }
                    })
                };

                const url =
                    "https://api.hsforms.com/submissions/v3/integration/submit/44889300/32a577e3-e11c-4a81-8d47-928eac2da767";

                console.log("Enroll: ", payload,
                    url
                );

                return fetch(
                    url, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": "Bearer {{ env('HUBSPOT_APP_TOKEN') }}",
                        },
                        body: JSON.stringify(payload),
                    });
            }
        </script>
    </div>
</section>
