<div class="main-center justify-content-center">
    <table class="table bg-light border mb-4">
        <tbody>
            <tr class="text-center bold">
                <td colspan="2">Текущий сеанс</td>
            </tr>
            <tr class="text-center bold">
                <td>Страница</td>
                <td>Количество посещений</td>
            </tr>
            <script>
                seedCookie('История');
                drawSessionTable(false);
            </script>
        </tbody>
    </table>
    <table class="table bg-light border mb-4">
        <tbody>
            <tr class="text-center bold">
                <td colspan="2">Все сеансы</td>
            </tr>
            <tr class="text-center bold">
                <td>Страница</td>
                <td>Количество посещений</td>
            </tr>
            <script>
                drawSessionTable(true);
            </script>
        </tbody>
    </table>
</div>