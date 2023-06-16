<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="../src/jquery.typeahead.css">

    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
    <!--script src="../dist/jquery.typeahead.min.js"></script-->
    <script src="../src/jquery.typeahead.js"></script>

</head>
<body>

<div style="width: 100%; max-width: 800px; margin: 0 auto;">

    <form>
        <p id="result-container"></p>

        <div class="typeahead-container">
         
            <div class="typeahead-field">   
            
            <span class="typeahead-button">
                <button disabled>
                    <span class="typeahead-search-icon"></span>
                </button>
            </span>
            
            <input id="q" name="q" type="search" autofocus autocomplete="off">
            </div>
        </div>
    </form>

    <script>

        var data = {
            cuti: [
			"Cuti >> Cuti Tahunan dan Sakit",
			"Cuti >> Cuti Khas Persidangan",
			"Cuti >> Cuti Kehadapan dan GCR",
			"Cuti >> Cuti Haji",
			"Cuti >> Cuti Gantian"],
			tuntutan: [
			"Tuntutan >> Modul Wang Pendahuluan Diri",
			"Tuntutan >> Tuntutan Kerja Lebih Masa",
			"Tuntutan >> Tuntutan Pengajaran Sambilan",
			"Tuntutan >> Modul Tuntutan Perjalanan Diri"],
			disiplin: [
			"Disiplin >> E-Disiplin"],
			kehadiran: [
			"kehadiran >> Pengesahan Kerja Lebih Masa",
			"kehadiran >> Rekod Kehadiran"],
			KPI: [
			"Penilaian Prestasi Tahunan >> Performance Management System (PMS)"]
	    };
		
        $('#q').typeahead({
            minLength: 1,
            order: "asc",
            group: true,
            groupMaxItem: 6,
            hint: true,
            dropdownFilter: "All",
            href: "https://en.wikipedia.org/?title={{display}}",
            template: "{{display}}",
            source: {
                Cuti: {
                    data: data.cuti
                },
                Tuntutan: {
                    data: data.tuntutan
                },
				Disiplin: {
                    data: data.disiplin
                },
				Kehadiran: {
                    data: data.kehadiran
                },
				KPI: {
                    data: data.KPI
				}
            },
            callback: {
                onClickAfter: function (node, a, item, event) {

                    var r = confirm("You will be redirected to:\n" + item.href + "\n\nContinue?");
                    if (r == true) {
                        window.open(item.href);
                    }

                    $('#result-container').text('');

                },
                onResult: function (node, query, obj, objCount) {

                    var text = "";
                    if (query !== "") {
                        text = objCount + ' elements matching "' + query + '"';
                    }
                    $('#result-container').text(text);

                }
            },
            debug: true
        });

    </script>

</div>

</body>
</html>