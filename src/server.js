const express = require('express');
const app = express();
const port = 3000; // Kies een poortnummer

app.use(express.static('public')); // Hiermee wordt de 'public' map als statische inhoud beschikbaar gesteld

app.get('/data', (req, res) => {
    // Genereer willekeurige gegevens
    const data = {
        labels: ['Apples', 'Bananas', 'Oranges'],
        datasets: [{
            label: 'Verkoop',
            data: [Math.floor(Math.random() * 10) + 1, Math.floor(Math.random() * 10) + 1, Math.floor(Math.random() * 10) + 1],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };
    res.json(data);
});

app.listen(port, () => {
    console.log(`Server is listening at http://localhost:${port}`);
});
