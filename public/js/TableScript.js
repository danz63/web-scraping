var table = document.getElementById('TableSort');
var order = "";
if (table != null) {
    TableSort(undefined);
}
var el = document.querySelectorAll("#TableSort thead tr th");
el.forEach(function (v) {
    v.addEventListener('click', function () {
        if (table != null) {
            resetColor();
            this.classList.add("selected");
            var sortBy = this.getAttribute('attr-sb');
            TableSort(sortBy);
        }
    })
});

function resetColor() {
    let t = table.children[0].children[0].children;
    for (var i = 0; i < t.length; i++) {
        t[i].classList.remove("selected");
    }
}


function TableSort(sortBy) {
    var a = document.getElementById('TableSort');
    // get table and create element table
    if (a.classList.length == 0) {
        a.classList.value = "table table-bordered table-striped table-hovered";
    }

    // get thead and create element thead
    var b = a.children[0];
    if (b.classList.length == 0) {
        b.classList.value = "thead-light";
    }
    var title = [];
    var c = b.children[0];
    for (let i = 0; i < c.children.length; i++) {
        var d = c.children[i];
        title.push(d.innerHTML);
        d.setAttribute("attr-sb", d.innerHTML);
    }

    var arrayData = [];
    var e = a.children[1].children;
    if (a.children[1].children.length > 0) {
        for (var i = 0; i < e.length; i++) {
            var row = [];
            for (var j = 0; j < e[i].children.length; j++) {
                key = title[j];
                row[key] = e[i].children[j].innerText;
            }
            arrayData.push(Object.assign({}, row));
        }

        // Sort data by value of var sortBy
        if (order == "") {
            order = "asc";
        } else if (order == "asc") {
            order = "desc";
        } else if (order == "desc") {
            order = "asc";
        }
        if (sortBy != undefined) {
            arrayData.sort(GetSortOrder(sortBy));
        }
        var f = document.createElement("tbody");
        for (var i = 0; i < arrayData.length; i++) {
            var g = document.createElement("tr");
            for (var j = 0; j < Object.keys(arrayData[i]).length; j++) {
                var h = j == 0 ? document.createElement("th") : document.createElement("td");
                h.innerHTML = j == 0 ? i + 1 : arrayData[i][title[j]];
                g.appendChild(h);
            }
            f.appendChild(g);
        }
    }
    a.appendChild(f);
    var f1 = a.children[1];
    var parent = f1.parentNode;
    parent.removeChild(f1);
    delete a;
    delete b;
    delete c;
    delete d;
    delete e;
    delete f;
    delete g;
    delete h;
}

function GetSortOrder(prop) {
    if (order == 'asc') {
        c = -1;
        d = 1;
    } else {
        c = 1;
        d = -1;
    }
    return function (a, b) {
        a[prop] = CheckString(a[prop]);
        b[prop] = CheckString(b[prop]);
        if (a[prop] > b[prop]) {
            return c;
        } else if (a[prop] < b[prop]) {
            return d;
        }
        return 0;
    }
}

function CheckString(str) {
    if (!Number(str)) {
        return str;
    } else {
        if (Number(str) == Infinity) {
            return str;
        } else {
            return parseInt(str);
        }
    }
}