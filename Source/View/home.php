<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="shared/styles/style.css">
    <link rel="shortcut icon" href="shared/images/dolar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1 class="text-center pt-3">Conversor de Moedas</h1>
    </header>
    <section class="container pt-2">
        <div class="form-conversor">

            <div id="customAlert" class="alert alert-warning alert-dismissible fade" role="alert">
                <strong>Atenção!</strong> As opções selecionadas não podem ser iguais.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <form method="post" class="form-control">
                <h2 class="text-center pt-3 pb-3">Escolha as Moedas que deseja converter</h2>
                <div class="select">
                    <div class="form-floating">
                        <select class="form-control" name="moeda1" id="moeda1" required>
                            <option value="" selected disabled>Selecione...</option>
                            <?php if(!empty($moedas)): ?>
                                <?php foreach($moedas as $nome => $valor): ?>
                                    <option value="<?= $valor ?>"><?= $nome ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <label class="floatingSelect" for="moeda1" name="moeda1">Escolha a Moeda 1</label>
                    </div>
                    <div class="form-group text-center">
                        <p class="pt-3">Para</p>
                    </div>
                    <div class="form-floating">
                        <select class="form-control" name="moeda2" id="moeda2" required>
                            <option value="" selected disabled>Selecione...</option>
                            <?php if(!empty($moedas)): ?>
                                <?php foreach($moedas as $nome => $valor): ?>
                                    <option value="<?= $valor ?>"><?= $nome ;?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <label class="floatingSelect" for="moeda2" name="moeda2">Escolha a Moeda 2</label>
                    </div>
                </div>
                <button class="btn btn-primary mt-5" type="submit" id="submit">Converter</button>
            </form>
        </div>
        <div class="result container">
            <h4 class="text-center pt-5">Resultados</h4>
            <div class="conversao form-floating"></div>
            <div class="hightValue form-floating"></div>
            <div class="minValue form-floating"></div>
        </div>
    </section>
    <footer>
        <p class="text-center mt-4 pt-5 pb-4">Desenvolvido por Djonatan R Oliveira e Ayrton Lorenzo Klettenberg &copy;</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="shared/scripts/jquery-3.7.1.min.js"></script>
    <script src="shared/scripts/script.js"></script>
</body>
</html>