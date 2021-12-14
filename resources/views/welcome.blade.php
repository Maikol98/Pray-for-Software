<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Backend PITCH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/ml5@latest/dist/ml5.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  </head>

  <body>
    <div class="container py-5"></div>

    <div class="row px-4">
      <div class="col col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">DATOS</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text">
                      Periodos
                    </span>
                    <input type="text" id="periodo" class="form-control" value="3">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text">
                      Inversion
                    </span>
                    <input type="text" id="inversion" class="form-control" value="2000">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text">
                      Roi
                    </span>
                    <input type="text" id="roi" class="form-control" value="11.5383">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text">
                      Van
                    </span>
                    <input type="text" id="van" class="form-control" value="-169.0602">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text">
                      Tir
                    </span>
                    <input type="text" id="tir" class="form-control" value="6.656">
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary" id="boton" onclick="classify()">Resultados</button>
          </div>
        </div>
      </div>
      <div class="col col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Tabla de Resultados</h4>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Valores</th>
                <th>Resultado</th>
                <th>Resultado %</th>
              </tr>
            </thead>
            <tbody id="tablaB"></tbody>
          </table>
        </div>
      </div>
    </div>


    <script>
      // Your code will go here
      // open up your console - if everything loaded properly you should see the correct version number
      // Step 1: load data or create some data 
        const data = [
        {nPeriodos:3,   inversion:2000,   Roi:11.5385,   Van: -169.0602 ,   tir: 6.656,   resultado:'no Rentable'},
        {nPeriodos:4,   inversion:100000, Roi:15,        Van: 1680.2244,    tir: 11.8137, resultado:'poco Rentable'},
        {nPeriodos:4,   inversion:10000,  Roi:90.9091,   Van: 11147.6765,   tir: 40.6136, resultado:'muy Rentable'}, //muy rentable
        {nPeriodos:4,   inversion:10000,  Roi:45.4545,   Van: 5512.2284,    tir: 34.9034, resultado:'Rentable'},
        {nPeriodos:3,   inversion:600000, Roi:7.1429,    Van: -114696,      tir: 3.2518,  resultado:'no Rentable'},
        {nPeriodos:5,   inversion:100000, Roi:0,         Van: -299210.1267, tir: 0,       resultado:'no Rentable'},
        {nPeriodos:5,   inversion:150000, Roi:12.5,      Van: -260198.0527, tir: 4.6983,  resultado:'no Rentable'},
        {nPeriodos:5,   inversion:1700000 ,    Roi:22.2222  ,      Van: -689.6496    , tir: 10.9839  , resultado:'no Rentable'}, //,,,,,no
        {nPeriodos:5,   inversion:10000000,    Roi:50       ,      Van: 3087144.757  , tir: 18.7146  , resultado:'Rentable'}, //,,,,,rentable
        {nPeriodos:5,   inversion:20000000,    Roi:20       ,      Van: -1694854.188 , tir: 8.0507   , resultado:'no Rentable'}, //,,,,,no
        {nPeriodos:5,   inversion:16000000,    Roi:33.3333  ,      Van: 1267793.727  , tir: 14.2443  , resultado:'poco Rentable'}, //,,,,,poco
        {nPeriodos:5,   inversion:10000000,    Roi:36       ,      Van: 2364800.792  , tir: 16.8729  , resultado:'poco Rentable'}, //,,,,,poco
        {nPeriodos:5,   inversion:18000000,    Roi:5.2632   ,      Van: -5100259.594 , tir: 2.5406   , resultado:'no Rentable'}, //,,,,,no
        {nPeriodos:5,   inversion:16000000,    Roi:26.9231  ,      Van: 1267793.727  , tir: 14.2443  , resultado:'poco Rentable'}, //,,,,,poco
        {nPeriodos:5,   inversion:35000   ,    Roi:2.7586   ,      Van: -9621.3745   , tir: 1.5271   , resultado:'no Rentable'}, //,,,,,no
        {nPeriodos:3,   inversion:20000   ,    Roi:13.0434  ,      Van: -2040.3607   , tir: 6.565    , resultado:'no Rentable'}, //,,,,,no
        {nPeriodos:6,   inversion:200000  ,    Roi:210.3448 ,      Van: 355039.9886  , tir: 64.0352  , resultado:'muy Rentable'}, //,,,,,bastante
        {nPeriodos:6,   inversion:200000  ,    Roi:130.7692 ,      Van: 170026.6591  , tir: 38.6717  , resultado:'muy Rentable'}, //,,,,,muy
        {nPeriodos:6,   inversion:200000  ,    Roi:313.7931 ,      Van: 560610.3548  , tir: 90.5688  , resultado:'muy Rentable'}, //,,,,,bastante
        {nPeriodos:3,   inversion:5000    ,    Roi:21.4285  ,      Van: 1312.6366    , tir: 25.7031  , resultado:'muy Rentable'}, //,,,,,muy
        {nPeriodos:3,   inversion:5000    ,    Roi:0        ,      Van: -535.7142    , tir: 0        , resultado:'no Rentable'}, //,,,,,no
        {nPeriodos:3,   inversion:5000    ,    Roi:35.7142  ,      Van: 2927.5236    , tir: 42.9372  , resultado:'muy Rentable'}  //,,,,,bastante
      ];

        // Step 2: set your neural network options
        const options = {
        task: 'classification',
        debug: false
        }

        // Step 3: initialize your neural network
        const nn = ml5.neuralNetwork(options);

        // Step 4: add data to the neural network
        data.forEach(item => {
        const inputs = {
          nPeriodos :item.nPeriodos,   
          inversion :item.inversion,   
          Roi       :item.Roi,   
          Van       :item.Van,    
          tir       :item.tir
        };
        const output = {
          resultado: item.resultado
        };

        nn.addData(inputs, output);
        });

        // Step 5: normalize your data;
        nn.normalizeData();

        // Step 6: train your neural network
        const trainingOptions = {
        epochs: 32,
        batchSize: 12
        }
        nn.train(trainingOptions, finishedTraining);

        // Step 7: use the trained model
        function finishedTraining(){
        classify();
        }

        // Step 8: make a classification
        function classify(){

        const input = {
          nPeriodos: parseFloat(document.getElementById('periodo').value),   
          inversion: parseFloat(document.getElementById('inversion').value),   
          Roi:  parseFloat(document.getElementById('roi').value),    
          Van:  parseFloat(document.getElementById('van').value),    
          tir: parseFloat(document.getElementById('tir').value)
        }

        console.log(input);

        nn.classify(input, handleResults);
        }

        // Step 9: define a function to handle the results of your classification
        function handleResults(error, result) {
        if(error){
            console.log(error);
            return;
        }

        var template = '';
        result.forEach(task => {
          // console.log(task['label']);
          let porcentaje = task['confidence'] * 100;
          porcentaje = parseInt(porcentaje,10);
          template += `
                  <tr>
                    <td>${task['label']}</td>
                    <td>${task['confidence']}</td>
                    <td>${porcentaje} %</td>
                  </tr>
                `
        });
        $('#tablaB').html(template);
        }

    </script>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" 
      crossorigin="anonymous">
    </script>

  </body>
</html>
