<?php
include './modules/database.php';
include './configs/global.php';

Database::connect(MYSQL_USER, MYSQL_PASSWORD, MYSQL_HOST, MYSQL_DATABASE);

// Getting stats albums from db

class MainController
{
    private $years;

    public function controller(): void
    {
        $sth = Database::$db->Prepare(
            "SELECT YEAR(released) AS year, COUNT(*) AS count_songs " . // attributes
                "FROM albums " . // table
                "WHERE released IS NOT NULL " . // conditionШестёрка самых пародируемых артистов
                "GROUP BY year " . // group
                "ORDER BY year ASC" // sort
        );

        $sth->execute();
        $this->years = $sth->fetchAll(PDO::FETCH_CLASS);
    }

    public function main(): void
    { ?>
        <table>
            <thead>
                <tr>
                    <th>Год</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->years as $year) { ?>
                    <tr>
                        <td> <?= htmlspecialchars($year->year) ?> </td>
                        <td> <?= htmlspecialchars($year->count_songs) ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
<?php
    }
}

$controller = new MainController;

$controller->controller();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статистика</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="bg-light h-100">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Динамика альбомописания
                </div>

                <div class="card-body">
                    <canvas id="statsAlbums"></canvas>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header text-center">
                    Пятёрка самых «урожайных» лет
                </div>

                <div class="card-body">
                    <canvas id="ratingAlbums"></canvas>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header text-center">
                    Пятёрка самых «урожайных» альбомов
                </div>

                <div class="card-body">
                    <canvas id="ratingAlbumsSongs"></canvas>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header text-center">
                    Шестёрка самых пародируемых артистов
                </div>

                <div class="card-body">
                    <canvas id="ratingParodyArtists"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            Right content
        </div>
    </div>
</body>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js""></script>
<script src=" /assets/js/index.js"></script>

</html>