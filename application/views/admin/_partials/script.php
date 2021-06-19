<script>
    $('#gambar').change(function (e2) {
        var fileName2 = e2.target.files[0].name;
        $('#idgambar').html(fileName2);
    });

    function changeLabel(a,b)
    {
        var name = document.getElementById(a);
        var label = document.getElementById(b);
        label.innerHTML = name.files.item(0).name;
    }
</script>