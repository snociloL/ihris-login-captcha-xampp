<!DOCTYPE html>
<html>
<head>
<title>Untitled Document</title>
 <link rel="stylesheet" href="../src/jquery.typeahead.css">

    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="../dist/jquery.typeahead.min.js"></script>
    <script src="../src/jquery.typeahead.js"></script>
<style>
.project-jquerytypeahead.page-demo .typeahead-list li a {
    position: relative;
}
 
.project-jquerytypeahead.page-demo .result-container {
    position: absolute;
    color: #777;
    top: -1.5em;
}
 
.project-jquerytypeahead.page-demo .typeahead-search li a .flag-chart {
    position: absolute;
    right: 16px;
    top: 10px;
}
 
.flag-chart {
    position: absolute;
    right: 10px;
    top: 6px;
    width: 30px;
    height: 20px;
    line-height: 14px;
    vertical-align: text-top;
    display: inline-block;
    margin: -1px 3px -1px 0;
    background:url(/assets/jquerytypeahead/img/country_v2.png) no-repeat scroll left top transparent;
}
.flag-united-states {
    background-position: -30px top;
}
.flag-united-kingdom {
    background-position: -60px top;
}
.flag-france {
    background-position: -90px top;
}
.flag-germany {
    background-position: -120px top;
}
.flag-denmark {
    background-position: -150px top;
}
.flag-italy {
    background-position: -180px top;
}
.flag-mexico {
    background-position: -210px top;
}
.flag-brazil {
    background-position: -240px top;
}
.flag-canada {
    background-position: -270px top;
}
 
/* MORE FLAGS BELOW */
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$('#country_v2-query').typeahead({
    minLength: 1,
    order: "asc",
    href: "https://en.wikipedia.org/?title={{display}}",
    template: "{{display}} <small style='color:#999;'>{{group}}</small>",
    source: {
        country: {
            url: ["/jquerytypeahead/country_v2.json", "data.country"]
        },
        capital: {
            url: [
                {
                    type: "POST",
                    url: "/jquerytypeahead/country_v2.json",
                    data: {myKey: "myValue"}
                },
                "data.capital"
            ]
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
 
        },
        onMouseEnter: function (node, a, obj, e) {
 
            if (obj.group === "country") {
                $(a).append('<span class="flag-chart flag-' + obj.display.replace(' ', '-').toLowerCase() + '"></span>')
            }
 
        },
        onMouseLeave: function (node, a, obj, e) {
 
            $(a).find('.flag-chart').remove();
 
        }
    }
});



</script>

</head>

<body>

<var id="result-container" class="result-container"></var>
 
<form id="form-country_v2" name="form-country_v2">
    <div class="typeahead-container">
        <div class="typeahead-field">
 
            <span class="typeahead-query">
                <input id="country_v2-query" name="country_v2[query]" type="search" placeholder="Search" autocomplete="off">
            </span>
            <span class="typeahead-button">
                <button type="submit">
                    <i class="typeahead-search-icon"></i>
                </button>
            </span>
 
        </div>
    </div>
</form>

</body>
</html>

