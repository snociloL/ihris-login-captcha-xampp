<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .row {
    display: table-row;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .row  > * {
    display: table-cell;
    vertical-align: middle;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .username {
    padding: 0 10px;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .id {
    font-size: 12px;
    color: #777;
    font-variant: small-caps;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .avatar img {
    height: 26px;
    width: 26px;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .project-logo {
    display: inline-block;
    height: 100px;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .project-logo img {
    height: 100%;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .project-information {
    display: inline-block;
    vertical-align: top;
    padding: 20px 0 0 20px;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .project-information > span {
    display: block;
    margin-bottom: 5px;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result > ul > li > a small {
    padding-left: 0px;
    color: #999;
}
 
.project-jquerytypeahead.page-demo #form-user_v1 .typeahead-result .project-information li {
    font-size: 12px;
}
</style>

<script>$('#user_v1-query').typeahead({
    minLength: 1,
    order: "asc",
    dynamic: true,
    delay: 500,
    backdrop: {
        "background-color": "#fff"
    },
    template: '<span class="row">' +
        '<span class="avatar">' +
            '<img src="{{avatar}}">' +
        "</span>" +
        '<span class="username">{{username}}{{status}}</span>' +
        '<span class="id">({{id}})</span>' +
    "</span>",
    source: {
        user: {
            display: "username",
            href: "https://www.github.com/{{username}}",
            data: [{
                "id": 415849,
                "username": "an inserted user that is not inside the database",
                "avatar": "https://avatars3.githubusercontent.com/u/415849",
                "status":  " <small style='color: #777'>(contributor)</small>"
            }],
            url: [{
                type: "POST",
                url: "/jquerytypeahead/user_v1.json",
 
                data: {
                    q: "{{query}}"
                },
                callback: {
                    done: function (data) {
                        for (var i = 0; i < data.data.user.length; i++) {
                            if (data.data.user[i].username === 'running-coder') {
                                data.data.user[i].status = ' <small style="color: #ff1493">(owner)</small>';
                            } else {
                                data.data.user[i].status = ' <small style="color: #777">(contributor)</small>';
                            }
                        }
                        return data;
                    }
                }
            }, "data.user"]
        },
        project: {
            display: "project",
            href: function (item) {
                return '/' + item.project.replace(/\s+/g, '').toLowerCase() + '/documentation/'
            },
            url: [{
                type: "POST",
                url: "/jquerytypeahead/user_v1.json",
                data: {
                    q: "{{query}}"
                }
            }, "data.project"],
            template: '<span>' +
                '<span class="project-logo">' +
                    '<img src="{{image}}">' +
                '</span>' +
                '<span class="project-information">' +
                    '<span class="project">{{project}} <small>{{version}}</small></span>' +
                    '<ul>' +
                        '<li>{{demo}} Demos</li>' +
                        '<li>{{option}}+ Options</li>' +
                        '<li>{{callback}}+ Callbacks</li>' +
                    '</ul>' +
                '</span>' +
            '</span>'
        }
    },
    callback: {
        onClick: function (node, a, item, event) {
 
            // You can do a simple window.location of the item.href
            alert(JSON.stringify(item));
 
        },
        onSendRequest: function (node, query) {
            console.log('request is sent, perhaps add a loading animation?')
        },
        onReceiveRequest: function (node, query) {
            console.log('request is received, stop the loading animation?')
        }
    },
    debug: true
});
</script>
</head>

<body>

<form id="form-user_v1" name="form-user_v1">
    <div class="typeahead-container">
        <div class="typeahead-field">
 
            <span class="typeahead-query">
                <input id="user_v1-query" name="user_v1[query]" type="search" placeholder="Search" autocomplete="off">
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








<?php

//sleep(1);
 
$query = (!empty($_POST['q'])) ? strtolower($_POST['q']) : null;
 
if (!isset($query)) {
    die('Invalid query.');
}
 
$status = true;
$databaseUsers = array(
    array(
        "id"        => 4152589,
        "username"  => "TheTechnoMan",
        "avatar"    => "https://avatars2.githubusercontent.com/u/4152589"
    ),
    array(
        "id"        => 7377382,
        "username"  => "running-coder",
        "avatar"    => "https://avatars3.githubusercontent.com/u/7377382"
    ),
    array(
        "id"        => 748137,
        "username"  => "juliocastrop",
        "avatar"    => "https://avatars3.githubusercontent.com/u/748137"
    ),
    array(
        "id"        => 619726,
        "username"  => "cfreear",
        "avatar"    => "https://avatars0.githubusercontent.com/u/619726"
    ),
    array(
        "id"        => 5741776,
        "username"  => "solevy",
        "avatar"    => "https://avatars3.githubusercontent.com/u/5741776"
    ),
    array(
        "id"        => 906237,
        "username"  => "nilovna",
        "avatar"    => "https://avatars2.githubusercontent.com/u/906237"
    ),
    array(
        "id"        => 612578,
        "username"  => "Thiago Talma",
        "avatar"    => "https://avatars2.githubusercontent.com/u/612578"
    ),
    array(
        "id"        => 2051941,
        "username"  => "webcredo",
        "avatar"    => "https://avatars2.githubusercontent.com/u/2051941"
    ),
    array(
        "id"        => 985837,
        "username"  => "ldrrp",
        "avatar"    => "https://avatars2.githubusercontent.com/u/985837"
    ),
    array(
        "id"        => 1723363,
        "username"  => "dennisgaudenzi",
        "avatar"    => "https://avatars2.githubusercontent.com/u/1723363"
    ),
    array(
        "id"        => 2649000,
        "username"  => "i7nvd",
        "avatar"    => "https://avatars2.githubusercontent.com/u/2649000"
    ),
    array(
        "id"        => 2757851,
        "username"  => "pradeshc",
        "avatar"    => "https://avatars2.githubusercontent.com/u/2757851"
    )
);

$resultUsers = $resultUsers[]; 
foreach ($databaseUsers as $key => $oneUser) {
    if (strpos(strtolower($oneUser["username"]), $query) !== false ||
        strpos(str_replace('-', '', strtolower($oneUser["username"])), $query) !== false ||
        strpos(strtolower($oneUser["id"]), $query) !== false) {
        $resultUsers[] = $oneUser;
    }
}
 
$databaseProjects = array(
    array(
        "id"        => 1,
        "project"   => "jQuery Typeahead",
        "image"     => "https://www.runningcoder.org/assets/jquerytypeahead/img/jquerytypeahead-preview.jpg",
        "version"   => "1.7.0",
        "demo"      => 10,
        "option"    => 23,
        "callback"  => 6,
    ),
    array(
        "id"        => 2,
        "project"   => "jQuery Validation",
        "image"     => "https://www.runningcoder.org/assets/jqueryvalidation/img/jqueryvalidation-preview.jpg",
        "version"   => "1.4.0",
        "demo"      => 11,
        "option"    => 14,
        "callback"  => 8,
    )
);
 
$resultProjects = $resultProjects[];
foreach ($databaseProjects as $key => $oneProject) {
    if (strpos(strtolower($oneProject["project"]), $query) !== false) {
        $resultProjects[] = $oneProject;
    }
}
 
// Means no result were found
if (empty($resultUsers) && empty($resultProjects)) {
    $status = false;
}
 
header('Content-Type: application/json');
 
echo json_encode(array(
    "status" => $status,
    "error"  => null,
    "data"   => array(
        "user"      => $resultUsers,
        "project"   => $resultProjects
    )
));
?>
