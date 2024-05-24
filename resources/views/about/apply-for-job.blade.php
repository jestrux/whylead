@php
    $isHomePage = true;
@endphp

@extends('layout.index')

@section('title', 'Thrive In The Middle')
@section('description', 'Being a middle manager is challenging. Those above have priorities.')

@section('content')
    <div class="relative w-full">
        <div class="absolute -top-20 inset-0 bg-[#19124B] z-10">
        </div>

        <div class="relative z-10">
            <section class="lg:pt-12 px-8 pb-4 text-white">
                <div class="md:hidden block bg-accent py-8 px-4 text-center">
                    <h2 class="pt-3 text-2xl lg:text-3xl text-center font-bold">
                        Leave your CV with us
                    </h2>

                    <p class="mt-1">
                        When opportunities open up, you will be the first to know.
                    </p>
                </div>

                <div class="hidden md:block relative max-w-5xl mx-auto pb-12 text-center">
                    <h2 class="text-2xl lg:text-3xl text-center font-bold">
                        Leave your CV with us
                    </h2>

                    <p class="mt-3">
                        When opportunities open up, you will be the first to know.
                    </p>
                </div>
            </section>

        </div>
    </div>

    @php
        $fields = [
            pierField(['label' => 'First Name', 'name' => 'firstname', 'width' => 'half']),
            pierField(['label' => 'Last Name', 'name' => 'lastname', 'width' => 'half']),
            pierField([
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'width' => 'half',
            ]),
            pierField(['label' => 'Phone Number', 'name' => 'phone', 'width' => 'half']),
            pierField([
                'label' => 'Resume / CV',
                'name' => 'cv',
                'placeholder' => 'Enter link to your CV or LinkedIn Profile',
                'width' => 'half',
            ]),
            pierField([
                'label' => 'Motivation Letter',
                'name' => 'cover_letter',
                'placeholder' => 'Enter link to your motivation letter',
                'width' => 'half',
            ]),
            pierField([
                'label' => 'What role are you interested in?',
                'name' => 'role',
                'width' => 'half',
                'type' => 'select',
                'meta' => [
                    'choices' => [
                        'Leadership Development Consultant',
                        'Organizational Development Consultant',
                        'Competency Assessment Tool Developer',
                        'Performance Management Consultant',
                        'Research Consultant',
                        'Data Science Consultant  ',
                        'Team Building Facilitator',
                        'Executive Coach',
                    ],
                ],
            ]),
        ];
    @endphp


    <section class="pt-6 pb-12">
        <div class="max-w-4xl px-4 lg:px-8 mx-auto">
            <x-pier::new-form :$fields on-save="enroll"
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
                        "https://api.hsforms.com/submissions/v3/integration/submit/44889300/bba457c9-247f-46b4-bc23-3c900a70d0c3";

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
@endsection
