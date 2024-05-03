@extends('layout.index')

@section('title', 'Contact Us | WhyLead')

@section('description', 'Contact informations for WhyLead')

@section('content')
    <div class="max-w-7xl mx-auto flex flex-col lg:grid grid-cols-12 px-6 py-8 md:py-16 gap-12">
        <div class="col-span-5 lg:border-r border-stroke lg:pr-12">
            <h2 class="text-2xl font-bold leading-tight mb-6">
                Reach out to us
            </h2>

            <div class="flex flex-col gap-3">
                <div class="flex items-center bg-card dark:bg-content/5 border border-stroke py-3.5 px-5 rounded-md">
                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>

                    <div class="ml-1 pl-4 py-0.5">
                        +255 744 099 099
                    </div>
                </div>

                <div class="flex items-center bg-card dark:bg-content/5 border border-stroke py-3.5 px-5 rounded-md">
                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>


                    <div class="ml-1 pl-4 py-0.5">
                        yoda@whyleadothers.com
                    </div>
                </div>

                <div class="flex items-start bg-card dark:bg-content/5 border border-stroke py-3.5 px-5 rounded-md">
                    <div class="w-6">
                        <svg class="w-7 h-7 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>

                    <div class="-mt-1.5 ml-1 pl-4 py-0.5 leading-loose">
                        1st Floor,<span class="hidden md:inline"><br /></span>
                        A-Wing PLOT 172,<span class="hidden md:inline"><br /></span>
                        Mikocheni, Dar es Salaam<span class="hidden md:inline"><br /></span>
                        Tanzania
                    </div>
                </div>

                <div class="mt-5 flex items-center gap-5">
                    <a href="https://www.google.com/search?sca_esv=1f1d6c955383dad7&sca_upv=1&rlz=1CDGOYI_enTZ849TZ849&hl=en-GB&q=WhyLead%20Consultancy&ludocid=18404384182725025592&ibp=gwp%3B0%2C7&lsig=AB86z5WH4vgtH1Qq8AyuX04-pf1T&kgs=558f135cdfa72fd2&shndl=-1&source=sh%2Fx%2Floc%2Fact%2Fm4%2F3"
                        target="blank" class="bg-neutral-200 w-10 h-10 rounded-full flex items-center justify-center"
                        title="Google">
                        <svg class="w-5" viewBox="-3 0 262 262" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"
                                fill="#4285F4" />
                            <path
                                d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"
                                fill="#34A853" />
                            <path
                                d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"
                                fill="#FBBC05" />
                            <path
                                d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"
                                fill="#EB4335" />
                        </svg>
                    </a>

                    {{-- <a href="https://facebook.com/whyleadothers" target="blank"
                        class="w-10 h-10 rounded-full flex items-center justify-center" title="facebook"
                        style="background: rgb(22, 120, 242);">
                        <svg fill="#fff" width="20px" viewBox="0 0 24 24">
                            <path
                                d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z">
                            </path>
                        </svg>
                    </a> --}}

                    <a href="https://www.instagram.com/whyleadothers/" target="blank"
                        class="w-10 h-10 rounded-full flex items-center justify-center" title="instagram"
                        style="background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, rgba(0, 0, 0, 0) 50%), -webkit-radial-gradient(circle farthest-corner at 0 140%, #fec564, rgba(0, 0, 0, 0) 50%), -webkit-radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, rgba(0, 0, 0, 0) 50%), -webkit-radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, rgba(0, 0, 0, 0) 50%), -webkit-radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, rgba(0, 0, 0, 0) 50%), -webkit-radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, rgba(0, 0, 0, 0) 50%), -webkit-radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, rgba(0, 0, 0, 0)), -webkit-linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%); background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, rgba(0, 0, 0, 0)), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);">
                        <svg class="w-4" fill="#fff" viewBox="0 0 448 512">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </a>

                    <a href="https://twitter.com/whyleadothers" target="blank"
                        class="bg-black w-10 h-10 rounded-full flex items-center justify-center" title="twitter"
                        target="_blank">
                        <svg class="w-5" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M13.3174 10.7749L19.1457 4H17.7646L12.7039 9.88256L8.66193 4H4L10.1122 12.8955L4 20H5.38119L10.7254 13.7878L14.994 20H19.656L13.3171 10.7749H13.3174ZM11.4257 12.9738L10.8064 12.0881L5.87886 5.03974H8.00029L11.9769 10.728L12.5962 11.6137L17.7652 19.0075H15.6438L11.4257 12.9742V12.9738Z" />
                        </svg>
                    </a>

                    <a href="https://www.linkedin.com/company/whyleadconsultancy" target="blank"
                        class="w-10 h-10 rounded-full flex items-center justify-center" title="instagram"
                        style="background-color: #0072B1">
                        <svg class="w-4" fill="white" viewBox="0 0 310 310">
                            <path
                                d="M72.16 99.73H9.927a5 5 0 0 0-5 5v199.928a5 5 0 0 0 5 5H72.16a5 5 0 0 0 5-5V104.73a5 5 0 0 0-5-5zM41.066.341C18.422.341 0 18.743 0 41.362 0 63.991 18.422 82.4 41.066 82.4c22.626 0 41.033-18.41 41.033-41.038C82.1 18.743 63.692.341 41.066.341zM230.454 94.761c-24.995 0-43.472 10.745-54.679 22.954V104.73a5 5 0 0 0-5-5h-59.599a5 5 0 0 0-5 5v199.928a5 5 0 0 0 5 5h62.097a5 5 0 0 0 5-5V205.74c0-33.333 9.054-46.319 32.29-46.319 25.306 0 27.317 20.818 27.317 48.034v97.204a5 5 0 0 0 5 5H305a5 5 0 0 0 5-5V194.995c0-49.565-9.451-100.234-79.546-100.234z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div id="contactFormWrapper" class="col-span-7">
            <h2 class="text-2xl font-bold leading-tight mb-6">
                Send us a message
            </h2>

            @php
                $fields = [
                    pierField(['label' => 'First Name', 'name' => 'first_name', 'width' => 'half']),
                    pierField(['label' => 'Last Name', 'name' => 'last_name', 'width' => 'half']),
                    pierField([
                        'label' => 'Work Email',
                        'name' => 'email',
                        'type' => 'email',
                        'required' => true,
                        'width' => 'half',
                    ]),
                    pierField(['label' => 'Phone Number', 'name' => 'phone', 'width' => 'half']),
                    pierField([
                        'label' => 'Interested In',
                        'name' => 'interest',
                        'required' => true,
                        'width' => 'half',
                        'type' => 'select',
                        'meta' => [
                            'choices' => [
                                'Training',
                                'Thrive in the Middle',
                                'Perfomance Management',
                                'Facilitation for Strategic Gatherings',
                                'Team Building',
                                'Keynote Speaking',
                                'Consulting on Workplace Culture',
                            ],
                        ],
                    ]),
                    pierField(['label' => 'Company', 'name' => 'company', 'required' => true, 'width' => 'half']),
                    pierField([
                        'label' => 'Company Size ( Number of Employees )',
                        'name' => 'company_size',
                        'width' => 'half',
                        'type' => 'select',
                        'meta' => [
                            'choices' => ['10-40', '40-70', '70-120', '120-250', '250-500', 'Over 500'],
                        ],
                    ]),
                    pierField(['label' => 'Country', 'name' => 'country', 'width' => 'half']),
                    pierField(['label' => 'Expected Outcomes/Objectives', 'name' => 'objective', 'width' => 'half']),
                ];
            @endphp

            <x-pier::new-form :fields="$fields" on-save="sendEmail"
                success-message="We've received your message, we'll get back to you." />
        </div>
    </div>

    <script>
        function sendEmail(data, el) {
            const formData = [
                `Name: ${[data.first_name, data.last_name].join(' ')}`,
                `Email: ${data.email}`,
                `Phone Number: ${data.phone}`,
                `Company: ${data.company}`,
                `Company Size: ${data.company_size}`,
                `Country: ${data.company_size}`,
                `Interested In: ${data.interest}`,
                `Objective: ${data.objective}`,
            ].join('\n');

            // return console.log("Email: ", formData);

            const message = [
                `From: ${data.name} <${data.email}>`,
                `Sent On: ${new Intl.DateTimeFormat('en-UK',{
                        year: "numeric",
                        month: "long",
                        day: "2-digit",
                        hour: "numeric",
                        minute: "numeric",
                        hour12: true,
                    }).format(new Date())}\n`,
                formData
            ].join("\n")

            return fetch("https://us-central1-letterplace-c103c.cloudfunctions.net/api/mailer", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    "to": "wakyj07@gmail.com",
                    // "to": "yoda@whyleadothers.com",
                    "message": {
                        subject: "WhyLead Website Contact Form",
                        text: message
                    }
                }),
            });
        }
    </script>
@endsection
