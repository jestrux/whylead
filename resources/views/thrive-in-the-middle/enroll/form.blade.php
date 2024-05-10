@php
    $fields = [
        pierField(['label' => 'First Name', 'name' => 'firstname', 'width' => 'half']),
        pierField(['label' => 'Last Name', 'name' => 'lastname', 'width' => 'half', 'required' => false]),
        pierField([
            'label' => 'Work Email',
            'name' => 'email',
            'type' => 'email',
            'width' => 'half',
        ]),
        pierField(['label' => 'Phone Number', 'name' => 'phone', 'width' => 'half']),
        pierField([
            'label' => 'I am interested with the program for',
            'name' => 'i_am_interested_with_the_program_for',
            'required' => false,
            'width' => 'half',
            'type' => 'select',
            'meta' => [
                'choices' => ['Myself', 'Leaders in my organisation'],
            ],
        ]),
        pierField(['label' => 'Company Name', 'name' => 'company', 'width' => 'half']),
        pierField([
            'type' => 'number',
            'label' => 'Expected Participant Count',
            'name' => 'expected_participant_count',
            'required' => false,
            'width' => 'half',
        ]),
        pierField([
            'label' => 'Select Country',
            'name' => 'select_country',
            'required' => false,
            'width' => 'half',
            'type' => 'select',
            'meta' => [
                'choices' => $countries,
            ],
        ]),
        pierField(['label' => 'Job Title', 'name' => 'jobtitle', 'width' => 'half']),
        pierField([
            'label' => 'Total Years of Professional Experience',
            'name' => 'total_years_of_professional_experience',
            'width' => 'half',
            'type' => 'select',
            'meta' => [
                'choices' => ['0-3', '4-8', '9-14', '15-19', '20+'],
            ],
        ]),
        pierField([
            'label' => 'What format of the Thrive in the Middle are you considering?',
            'name' => 'what_format_of_the_thrive_in_the_middle_are_you_considering_',
            'width' => 'full',
            'type' => 'radio',
            'required' => false,
            'meta' => [
                'choices' => ['Hybrid | Face to Face and Virtual', 'Fully Virtual Program'],
            ],
        ]),
    ];
@endphp


<section class="pt-6 pb-12">
    <div class="max-w-4xl px-8 mx-auto">
        <x-pier::new-form :fields="$fields" on-save="enroll"
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
