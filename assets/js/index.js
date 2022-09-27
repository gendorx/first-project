const ctx = [
    document.getElementById('statsAlbums').getContext('2d'),
    document.getElementById('ratingAlbums').getContext('2d'),
    document.getElementById('ratingAlbumsSongs').getContext('2d'),
    document.getElementById('ratingParodyArtists').getContext('2d'),
]

/**
 *  Stats
 */

// Stats of album
const statsAlbums = new Chart(ctx[0], {
    type: 'bar',
    data: {
        labels: [
            '2001',
            '2002',
            '2003',
            '2004',
            '2005',
            '2006',
            '2007',
            '2008',
            '2010',
            '2018',
        ],
        datasets: [
            {
                label: 'альбомов',
                data: [4, 7, 5, 3, 2, 1, 4, 2, 1, 1],
                backgroundColor: '#0d6efd',
            },
        ],
    },
    options: {
        plugins: {
            legend: {
                display: false,
            },
        },
    },
})

// Stats of popular albums
const ratingAlbums = new Chart(ctx[1], {
    type: 'bar',
    data: {
        labels: ['2002', '2003', '2001, 2007', '2004', '2005, 2008'],
        datasets: [
            {
                label: 'альбомов',
                data: [7, 5, 4, 3, 2],
                backgroundColor: '#0d6efd',
            },
        ],
    },
    options: {
        indexAxis: 'y',
        plugins: {
            legend: {
                display: false,
            },
        },
    },
})

const ratingAlbumsSongs = new Chart(ctx[2], {
    type: 'bar',
    data: {
        labels: [
            'Москва — Калуга',
            `Ну ты дала Одноглазый уж Под газом`,
            'Аквариум',
            'В Коктебеле вечер',
            'Ебанько Ухуеплёченный',
            'Давай подрочим вместе',
        ],
        datasets: [
            {
                label: 'песен',
                data: [30, 27, 26, 25, 23, 21],
                backgroundColor: '#0d6efd',
            },
        ],
    },
    options: {
        indexAxis: 'y',
        datalabels: {
            display: false,
        },
        plugins: {
            legend: {
                display: false,
            },
        },
    },
})

const ratingParodyArtists = new Chart(ctx[3], {
    type: 'bar',
    data: {
        labels: [
            'Филипп Киркоров',
            `Вячеслав Малежик`,
            'Руки вверх',
            'Лесоповал',
            'Юрий Антонов',
            'Александр Серов',
        ],
        datasets: [
            {
                label: 'песен',
                data: [36, 34, 33, 22, 13, 8],
                backgroundColor: '#0d6efd',
            },
        ],
    },
    options: {
        indexAxis: 'y',
        datalabels: {
            display: false,
        },
        plugins: {
            legend: {
                display: false,
            },
        },
    },
})