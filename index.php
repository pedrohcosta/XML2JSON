<!DOCTYPE html>
<html>
    <head>
        <title>Teste</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
            function getXMLtoJSON() {
                var xml = $('#cadXMLtoJSON #xml').val();
                var url = 'converteXMLtoJSON.php';
                $.post(
                        url, 
                        {xml: xml},
                        function(d) {
                            $('#cadXMLtoJSON #json').val(d);
                        }
                );
            }
        </script>
    </head>
    <body>
        <form name="cadXMLtoJSON" id="cadXMLtoJSON" enctype="">
            <div class="content">
                <div class="box-left">
                    <div class="title">XML</div>
                    <textarea nome="xml" id="xml" rows="30"></textarea>
                </div>
                <div class="box-right">
                    <div class="title">JSON</div>
                    <textarea nome="json" id="json" rows="30"></textarea>
                </div>

                <div class="box-right">
                    <input type="button" value="Enviar" name="enviar" onclick="getXMLtoJSON()"/>
                </div>
            </div>
        </form>    
    </body>
</html>
