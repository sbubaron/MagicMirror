var config = {
    lang: 'en',
    time: {
        timeFormat: 12
    },
    weather: {
        //change weather params here:
        //units: metric or imperial
        params: {
            id: '5130672',
            units: 'imperial',
            // if you want a different lang for the weather that what is set above, change it here
            lang: 'en',
            APPID: '95dfd2ab8d3195a6310b4834135a87e0'
        }
    },
    mainController: {
        interval: 3000
    },
    fullCalendars: {
        interval: 120000,
    },
    countdown: {

    },
    compliments: {
        interval: 30000,
        fadeInterval: 4000,
        morning: [
            'Good morning, sunshine!',
            'Enjoy your day!',
            'Todays a good day for reflection!',
            'Mirrors show us what we look like, not who we are',
            'Mirrors don\'t talk and lucky for you we can\'t laught',
            'Look in the mirror, that is your competition',
            'What matters most if what you see in yourself',
            'I see alot of myself in you'
        ],
        afternoon: [
            'Good afternoon sir!',
            'Whatcha looking at?',
            'Todays a good day for reflection!'
        ],
        evening: [
            'Catch those Zzz\'s!',
            'Cleeeeaaannnn meeee!',
            'Life is like a mirror. Smile at it and it smiles back at you!',
            'I make you look good',
            'LOOK AT MEEEE!',
            'I can show you what you look like, not who you are.',
            'That awkward moment when you come home and look in the mirror and think.."Did I look like this all day?"'
        ]
    },
    calendar: {
        maximumEntries: 10,
        url: "https://p01-calendarws.icloud.com/ca/subscribe/1/n6x7Farxpt7m9S8bHg1TGArSj7J6kanm_2KEoJPL5YIAk3y70FpRo4GyWwO-6QfHSY5mXtHcRGVxYZUf7U3HPDOTG5x0qYnno1Zr_VuKH2M"
    },
    reminder: {
        maximumEntries: 10,
        url: "https://p01-calendarws.icloud.com/ca/subscribe/1/n6x7Farxpt7m9S8bHg1TGArSj7J6kanm_2KEoJPL5YIAk3y70FpRo4GyWwO-6QfHSY5mXtHcRGVxYZUf7U3HPDOTG5x0qYnno1Zr_VuKH2M"
    },
    headlines: {
        interval: 6000
    },
    onthisday: {
        interval: 1000 * 60 * 60 * 24
    },
    news: {
        feed: 'http://www.nytimes.com/services/xml/rss/nyt/HomePage.xml'
    }
}
