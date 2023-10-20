<?php 
$pageTitle = "Motorcycle Search";
require_once('template.php');
require_once('header.php');

?>

<div class="contentbox1">

    <h1>Bike Database</h1>
    <div class="form-container">
        <form id="api-form">
            <label for="make">Brand:</label>
            <input type="text" id="make" name="make" value="kawasaki">
            <br>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" value="ninja">
            <br>
            <button type="button" id="fetch-button">Search</button>
            <button type="button" id="reset-button">Reset</button>
        </form>
    </div>
    <div id="result"></div>
</div>

<script>
    $(document).ready(function() {
        $('#fetch-button').click(function() {
            const make = $('#make').val();
            const model = $('#model').val();

            $.ajax({
                method: 'GET',
                url: 'https://api.api-ninjas.com/v1/motorcycles',
                data: { make: make, model: model },
                headers: { 'X-Api-Key': 'YLGzLtYlue4esmCX9iiDXg==rhGA94iYpFF1V4ax' },
                success: function(result) {
                    console.log(result);
                    displayDropdown(result);
                },
                error: function(jqXHR) {
                    console.error('Error: ', jqXHR.responseText);
                    displayDropdown([{ error: jqXHR.responseText }]);
                }
            });
        });

        $('#reset-button').click(function() {
            // Clear the result container
            $('#result').empty();
        });
    });

    function displayDropdown(data) {
        if (Array.isArray(data) && data.length > 0) {
            const resultDiv = $('#result');
            resultDiv.empty();
            const models = {};

            data.forEach(item => {
                const model = item.model;
                if (!models[model]) {
                    models[model] = [];
                }
                models[model].push(item);
            });

            for (const model in models) {
                const modelData = models[model];
                const modelDiv = $('<div class="model-container">');
                const modelButton = $(`<button class="model-button">${model} Model</button>`);
                const modelTable = $('<table class="model-table" style="display: none;">'); // Initially hidden

                modelData.forEach(item => {
                    for (const key in item) {
                        const row = $('<tr>');
                        row.append($('<th>').text(key));
                        row.append($('<td>').text(item[key]));
                        modelTable.append(row);
                    }
                });

                modelDiv.append(modelButton);
                modelDiv.append(modelTable);
                resultDiv.append(modelDiv);
            }

            $('.model-button').click(function() {
                $(this).next('.model-table').slideToggle();
            });
        } else {
            $('#result').html('No data found.');
        }
    }
</script>
<script>
    import { JellyTriangle } from '@uiball/loaders'

<JellyTriangle 
 size={60}
 speed={1.75} 
 color="black" 
/>
</script>
</body>
</html>
