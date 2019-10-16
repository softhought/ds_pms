<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Test</title>
<style type="text/css">
    table { page-break-inside:auto }
    div   { page-break-inside:avoid; } /* This is the key */
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>
</head>
<body>
    <table>
        <thead>
            <tr><th>heading</th></tr>
        </thead>
        <tfoot>
            <tr><td>notes</td></tr>
        </tfoot>
        <tbody>
        <tr>
            <td></td>
        </tr>
       
        <tr>
            <td>x</td>
        </tr>
    </tbody>
    </table>
</body>
</html>

