@extends('layout.index')

@section('title', 'Podcast | WhyLead')

@section('description', 'Podcast for WhyLead')

@section('content')
    @php
        $episodes = [
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCRzNocUFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--42267deda5e0d8ff1485f92d5c944ff82ed74e1c/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Podcast%20Thumbnail.jpg',
                'title' => 'Master Any Skill: The Ultimate Guide to Learning How to Learn',
                'date' => 'April 02, 2024',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14709388-0070-master-any-skill-the-ultimate-guide-to-learning-how-to-learn-ft-barbara-oakley?t=0',
                'number' => '0070',
                'featuring' => 'Barbara Oakley',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTVFTbkFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--4fd7f760a8fc84507100f6ca76f68377c371879b/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/haesun%20Podcast%20Thumbnail.jpg',
                'title' => 'How to Have Conversations that Heal & Learning the Alphabet for Personal Transformation',
                'date' => 'March 26, 2024',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14567820-0069-how-to-have-conversations-that-heal-learning-the-alphabet-for-personal-transformation-ft-haesun-moon?t=0',
                'number' => '0069',
                'featuring' => 'Haesun Moon',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCSmNTbkFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--f61b3aeb413c2b3477e35c7a841aeb7b2f586203/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Morra%20Podcast%20Thumbnail.jpg',
                'title' => 'Win While Anxious & Transform Your Inner Critic into a Valuable Coach',
                'date' => 'March 12, 2024',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14614407-0068-win-while-anxious-transform-your-inner-critic-into-a-valuable-coach-ft-morra-aarons-melle?t=0',
                'number' => '0068',
                'featuring' => 'Morra Aarons Melle',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCSzY3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--cbfc665a50db5f09c99f39a1da4ca6eff3df36ce/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Podcast%20Thumbnail.jpg',
                'title' => 'Winning The Stress War, Embracing Calmness and Overcoming Procrastination',
                'date' => 'February 01, 2024',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14416142-0067-winning-the-stress-war-embracing-calmness-and-overcoming-procrastination-ft-paul-loomans?t=0',
                'number' => '0067',
                'featuring' => 'Paul Loomans',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTG03bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--afb7d61a27e3d4ab6301d4cc0a49f5b0d644f805/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Oliver%20Podcast%20Thumbnail.jpg',
                'title' => 'The Dark Side of Busyness: How Our Obsession Is Robbing Us of True Meaning',
                'date' => 'January 18, 2024',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14329013-0066-the-dark-side-of-busyness-how-our-obsession-is-robbing-us-of-true-meaning-ft-oliver-burkeman?t=0',
                'number' => '0066',
                'featuring' => 'Oliver Burkeman',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTCs3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--88bb2db3cb13a797530ea5f4970825c2fcafcef0/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/David%20Allen%20Podcast%20Thumbnail.jpg',
                'title' => 'Transform Your Life NOW: Unlocking Superhuman Productivity with David Allen',
                'date' => 'January 10, 2024',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14233296-0065-transform-your-life-now-unlocking-superhuman-productivity-with-david-allen?t=0',
                'number' => '0065',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCSU5HR2dZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--66cdf88630021e49faff3053a937972dbd4955d2/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1699425854054-cbb5ac9c40e5b.jpg',
                'title' => 'Cultivating Your Soft Life, Saying No, Avoiding Being Average and Grow Old and Rich',
                'date' => 'December 25, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14197398-0064-cultivating-your-soft-life-saying-no-avoiding-being-average-and-grow-old-and-rich-ft-sam-ndandala-anna-mwasha-and-chris-rwechungura?t=0',
                'number' => '0064',
                'featuring' => 'Sam Ndandala, Anna Mwasha and Chris Rwechungura',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTXE3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--a812218c263ebb120157b71e4dbe2f1d1b4e1b2e/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Janet%20Harvey%20Podcast%20Thumbnail.jpg',
                'title' => 'Invite Change and Embrace Judgment as a Catalyst for Growth',
                'date' => 'December 20, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14176845-0063-invite-change-and-embrace-judgment-as-a-catalyst-for-growth-ft-janet-harvey?t=0',
                'number' => '0063',
                'featuring' => 'Janet Harvey',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTSs3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--763bffcad64f97522798c6c628df3a9570d6b43c/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Brian%20Podcast%20Thumbnail.jpg',
                'title' => 'How to Lead Successfully in the Digital Age',
                'date' => 'December 13, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14139347-0062-how-to-lead-successfully-in-the-digital-age-ft-brian-spisak?t=0',
                'number' => '0062',
                'featuring' => 'Brian Spisak',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTmk3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--b89fa65619e37e2057ea7e8953612b8468fb8012/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Alexsys%20Podcast%20Thumbnail.jpg',
                'title' => 'How to Become a More Integrated Leader and Lead with Grace',
                'date' => 'December 06, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14097424-0061-how-to-become-a-more-integrated-leader-and-lead-with-grace-ft-alexsys-thompson?t=0',
                'number' => '0061',
                'featuring' => 'Alexsys Thompson',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCT0c3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--ffc41fe8412bcf4db775c4a87204099d3a8d6ae9/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Lucy%20Podcast%20Thumbnail.jpg',
                'title' => 'Building the Africa We Want',
                'date' => 'December 05, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14091298-0060-building-the-africa-we-want-ft-dr-lucy-surhyel-newman-hon-prof-kitila-mkumbo?t=0',
                'number' => '0060',
                'featuring' => 'Dr. Lucy Surhyel Newman & Hon. Prof. Kitila Mkumbo',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCT2E3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--6df909286660246f4cd21e51e6c702029a3d484b/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Matthias%20Podcast%20Thumbnail.jpg',
                'title' => 'Weird, Irrational, and Wonderful Ways Humans Navigate the Workplace',
                'date' => 'November 29, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14053623-0059-weird-irrational-and-wonderful-ways-humans-navigate-the-workplace-ft-matthias-sutter?t=0',
                'number' => '0059',
                'featuring' => 'Matthias Sutter',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCT3U3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--bedb681e21eec241b5d32a09013a313ccd4f959e/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Jeremie%20Podcast%20Thumbnail.jpg',
                'title' => 'Five Keys for Unshakable Peace and A formula for Successful Conversations',
                'date' => 'November 22, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/14010329-0058-five-keys-for-unshakable-peace-and-a-formula-for-successful-conversations-ft-jeremie-kubiceck?t=0',
                'number' => '0058',
                'featuring' => 'Jeremie Kubiceck',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCUFM3bVFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--d38176afa2b7e42ab0779ac568971dcf65f56d06/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/Christine%20Podcast%20Thumbnail.jpg',
                'title' => 'Choosing Excellence Every Time',
                'date' => 'November 15, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979003-0057-choosing-excellence-every-time-ft-christine-musisi?t=0',
                'number' => '0057',
                'featuring' => 'Christine Musisi',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCSVJHR2dZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--3d8b3f4ba61c4f1348759e28c33d91b0a5f90621/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'The Five Ingredients of Lasting Happiness',
                'date' => 'March 29, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13959482-0056-the-five-ingredients-of-lasting-happiness-ft-tal-ben-shahar?t=0',
                'number' => '0056',
                'featuring' => 'Tal Ben-Shahar',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCSWRHR2dZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--f4709ffac079cbc4fac911dbf269716ecfd839c4/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => "The Hero's Journey: How Leaders Can Guide Their Teams to Success",
                'date' => 'March 21, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13959483-0055-the-hero-s-journey-how-leaders-can-guide-their-teams-to-success-ft-dr-j-j-peterson?t=0',
                'number' => '0055',
                'featuring' => 'Dr. J.J. Peterson',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTkMvSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--abb60bfa0811a2a2f1bce759ed0bf23a4c0a44ab/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Nurturing Curiosity & The Impact of Learning on Leadership',
                'date' => 'March 07, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979004-0054-nurturing-curiosity-the-impact-of-learning-on-leadership-ft-amb-ombeni-sefue?t=0',
                'number' => '0054',
                'featuring' => 'Amb. Ombeni Sefue',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTksvSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--7a3a5780df344eb5defbdb6dce149866d809f894/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Leading From the Backseat',
                'date' => 'January 30, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979005-0053-leading-from-the-backseat-ft-ngasuma-kanyeka?t=0',
                'number' => '0053',
                'featuring' => 'Ngasuma Kanyeka',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTk8vSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--2f51d52e0e178b550a9c5a368837d3cad94a44d3/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Building Organic Clusters & Sustainable Innovation',
                'date' => 'January 18, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979006-0052-building-organic-clusters-sustainable-innovation-ft-dr-nkundwe-mwasaga?t=0',
                'number' => '0052',
                'featuring' => 'Dr. Nkundwe Mwasaga',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTlMvSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--b4162341f31e23eccbe36bcbfbbe914345d52916/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'The Power of Losing Control & The Principles of Authentic Power',
                'date' => 'January 12, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979007-0051-the-power-of-losing-control-the-principles-of-authentic-power-ft-joe-caruso?t=0',
                'number' => '0051',
                'featuring' => 'Joe Caruso',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTlcvSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--0c94626fe6533a326e117f0e45148c399561f679/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Mimetic Desire, Outcome Independence, Virtue Signalling & How to Be Your Best Self',
                'date' => 'January 02, 2023',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979008-0050-mimetic-desire-outcome-independence-virtue-signalling-how-to-be-your-best-self-ft-samwel-ndandala-princely-glorious?t=0',
                'number' => '0050',
                'featuring' => 'Samwel Ndandala & Princely Glorious',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTmEvSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--dc798c83cade04eb8478eee469e804512be227f4/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Delegating Your Way Out Of a Job',
                'date' => 'October 19, 2022',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979009-0049-delegating-your-way-out-of-a-job-ft-kwasi-frimpong?t=0',
                'number' => '0049',
                'featuring' => 'Kwasi Frimpong',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTmUvSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--d5c8526e2857b0fa47bceb734e4c5a35f6f6b64d/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Toxic Positivity, Overcoming Learned Helplessness & How to Become Happier',
                'date' => 'October 11, 2022',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979010-0048-toxic-positivity-overcoming-learned-helplessness-how-to-become-happier-ft-amaechi-nduka-agwu?t=0',
                'number' => '0048',
                'featuring' => 'Amaechi Nduka-Agwu',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTm0vSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--1271f765349b5d48de349a03d60269edf312d2cc/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Build a Team of Equals Who All Lead & Follow to Drive Creativity and Innovation',
                'date' => 'September 21, 2022',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979011-0047-build-a-team-of-equals-who-all-lead-follow-to-drive-creativity-and-innovation-ft-jeff-spahn?t=0',
                'number' => '0047',
                'featuring' => 'Jeff Spahn',
            ],
            [
                'image' =>
                    'https://www.buzzsprout.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBCTnEvSFFZPSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--8e24fa494eb8b660317dfcd87a1f852eeeca5391/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2QzNKbGMybDZaVWtpRFRZd01IZzJNREJlQmpzR1ZEb01aM0poZG1sMGVVa2lDMk5sYm5SbGNnWTdCbFE2QzJWNGRHVnVkRWtpRERZd01IZzJNREFHT3daVU9neHhkV0ZzYVhSNWFWVTZEMk52Ykc5eWMzQmhZMlZKSWdselVrZENCanNHVkE9PSIsImV4cCI6bnVsbCwicHVyIjoidmFyaWF0aW9uIn19--8a9b4b1bc245a46b538f72d4d9b2ab0a7fbe8ac1/8848136-1599487609594-9e03ddeb7f95e.jpg',
                'title' => 'Restore Your Common Sense in an Age of Experts and Artificial Intelligence',
                'date' => 'September 06, 2022',
                'link' =>
                    'https://www.buzzsprout.comundefined/2275900/13979012-0046-restore-your-common-sense-in-an-age-of-experts-and-artificial-intelligence-ft-vikram-mansharamani?t=0',
                'number' => '0046',
                'featuring' => 'Vikram Mansharamani',
            ],
        ];

    @endphp

    <div class="grid grid-cols-12 items-start max-w-7xl mx-auto px-8 py-8 xl:py-10">
        <div class="col-span-4 sticky -top-16 xl:-top-24">
            @include('podcast.sidebar')
        </div>

        <div class="col-span-8" x-data="{
            page: 0,
            async fetchEpisodes() {
                var res = await fetch('https://whylead.buzzsprout.com/2275900.js?page=' + this.page, {
                    headers: {
                        'Content-Type': 'application/json',
                    },
                }).then(res => res.text());

                const div = document.createElement(`div`);
                div.innerHTML = res;

                const parent = '.episode-list__row';
                const childrenMatchers = 'image::img::src|title::.episode-list--title span|date::.episode-list--title small|link::.episode-list__row a:first-child::href';

                let data = Array.from(div.querySelectorAll(parent)).reduce((agg, node) => {
                    const row = {};
                    const children = childrenMatchers.split(`|`);
                    children.forEach(child => {
                        const [key, matcher, attribute = `innerText`] = child.split(`::`);
                        const childNode = node.querySelector(matcher);
                        row[key.trim()] = childNode[attribute] || getComputedStyle(childNode)[attribute];
                    });

                    return [...agg, row];
                }, []);

                data = data.map((row) => {
                    const [number, fullTitle] = row.title.split(' - ');
                    row.number = number;

                    const [title, featuring] = fullTitle.split(' ft ');
                    row.title = title;
                    row.featuring = featuring;

                    row.link = row.link.replace(new URL(location.href).host, '').replace('https://', '').replace('http://');
                    row.link = 'https://www.buzzsprout.com' + row.link;

                    return row;
                });

                console.log('Podcast episodes: ', data);

                this.page += 1;
            },
            async init() {
                {{-- console.log('Fetch: ', this.fetchEpisodes); --}}
                {{-- this.fetchEpisodes(); --}}
            }
        }">
            <div class="max-w-3xl mx-auto px-12 pt-4">
                <h3 class="text-3xl font-bold">Podcast Episodes</h3>

                <div class="divide-y divide-stroke">
                    @foreach ($episodes as $episode)
                        <article aria-labelledby="episode-5-title" class="py-6">
                            <div class="md:px-4 lg:px-0 flex flex-row-reverse items-center gap-6">
                                <div class="flex-shrink-0 relative border size-20 overflow-hidden rounded-xl bg-content/5 shadow-xl"
                                    href="#">
                                    <img alt=""class="absolute size-full" src="{{ $episode['image'] }}" />
                                </div>

                                <div class="flex-1 flex flex-col items-start">
                                    <h2 id="episode-5-title" class="mt-2 text-sm font-bold">
                                        <a href="{{ $episode['link'] }}" target="_blank" class="hover:opacity-80">
                                            Episode {{ $episode['number'] }} <span class="opacity-50">&mdash;</span>
                                            <time datetime="2022-02-24T00:00:00.000Z"
                                                class="font-mono text-sm leading-7 opacity-50">
                                                {{ $episode['date'] }}
                                            </time>
                                        </a>
                                    </h2>

                                    @isset($episode['featuring'])
                                        <p datetime="2022-02-24T00:00:00.000Z" class="font-mono text-sm leading-7 opacity-50">
                                            Ft. {{ $episode['featuring'] }}
                                        </p>
                                    @endisset

                                    <p class="mt-1 text-lg leading-7 opacity-80">
                                        {{ $episode['title'] }}
                                        {{-- He’s going to need you to go
                                        ahead and come in on Saturday, but there’s a lot more to the story than you
                                        think. --}}
                                    </p>
                                    <div class="mt-4 flex items-center gap-4">
                                        <a href="{{ $episode['link'] }}" target="_blank"
                                            aria-label="Play episode 5: Bill Lumbergh"
                                            class="flex items-center gap-x-3 text-sm font-bold leading-6 text-primary hover:opacity-90 active:opacity-80">
                                            <svg aria-hidden="true" viewBox="0 0 10 10" class="h-2.5 w-2.5 fill-current">
                                                <path
                                                    d="M8.25 4.567a.5.5 0 0 1 0 .866l-7.5 4.33A.5.5 0 0 1 0 9.33V.67A.5.5 0 0 1 .75.237l7.5 4.33Z" />
                                            </svg>
                                            <span aria-hidden="true">Listen</span>
                                        </a>
                                        <span aria-hidden="true" class="text-sm font-bold text-slate-400">/</span>
                                        <a class="flex items-center text-sm font-bold leading-6 text-[#5C4EB8] dark:text-content/60 hover:opacity-80 active:opacity-90"
                                            aria-label="Show notes for episode 5: Bill Lumbergh" href="/5">
                                            Share
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
