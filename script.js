var m1;

function signUpModel() {
    var mu = document.getElementById("Model1");
    m1 = new bootstrap.Modal(mu);
    m1.show();
    m2.hide();


}

var m2;

function signInModel() {
    var mi = document.getElementById("Model2");
    m2 = new bootstrap.Modal(mi);
    m2.show();
    m1.hide();


}
var m3;

function adminSignInModel() {
    var ma = document.getElementById("Model3");
    m3 = new bootstrap.Modal(ma);
    m3.show();



}

var m4;

function adminSignInModel2() {
    var mav = document.getElementById("Model4");
    m4 = new bootstrap.Modal(mav);
    m3.hide();
    m4.show();



}

function signUp() {

    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var f = new FormData();
    f.append("name", name.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = this.responseText;
            if (t == "Login Success") {
                alert("Login Success");
                alert("Now You Can SignIn...");
                signInModel();
            } else {
                document.getElementById("error").innerHTML = t;
            }

        }
    };

    r.open("POST", "signUpProcess.php", true);
    r.send(f);


}

function signIn() {
    var mail = document.getElementById("email1");
    var password = document.getElementById("password1");
    var rememberMe = document.getElementById("rememberMe");
    var n = new FormData();
    n.append("m", mail.value);
    n.append("p", password.value);
    n.append("rememberMe", rememberMe.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Login Success");
                window.location.reload();
            } else {
                document.getElementById("error1").innerHTML = t;
            }

            // alert(t);

        }
    };

    r.open("POST", "signInProcess.php ", true);
    r.send(n);
}

function signOut() {

    alert("Are your sure want to logout?");
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t = "success") {

                window.location.reload();
            } else {
                alert(t);
            }



        }
    };

    r.open("POST", "signOutProcess.php", true);
    r.send();
}



function fogotpassword() {
    var email = document.getElementById("email1");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Password sent to your Email.Please Check the inbox");

            } else {
                alert(t);
            }
        }
    };
    r.open("GET", "fogotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function addToCart(id) {
    // alert("ok");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "please SignIn First") {
                alert(t);

            } else {
                alert(t);
            }

        }
    };

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();
}

function addToWatchlist(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            alert(t);
            window.location.reload();



        }
    };

    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();

}

function watchlistRemove(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            alert(t);
            window.location.reload();



        }
    };

    r.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    r.send();


}

function cartRemove(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            alert(t);
            window.location.reload();



        }
    };

    r.open("GET", "removeCartProcess.php?id=" + id, true);
    r.send();


}


function adminVerify() {

    var mail = document.getElementById("e");
    var password = document.getElementById("p");

    var n = new FormData();
    n.append("m", mail.value);
    n.append("p", password.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("verification code send your email");
                adminSignInModel2();
            } else {
                alert(t)
            }



        }
    };

    r.open("POST", "adminsignInProcess.php ", true);
    r.send(n);
}


function adminVerify2() {

    var vc = document.getElementById("vc");


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "http://localhost/imac/php/adminDashboard.php";

            }


        }
    };

    r.open("GET", "adminsignInProcess2.php?id=" + vc.value, true);
    r.send();
}

function checkOutProcess(id) {

    var product_id = id;
    var product_qty = document.getElementById("qty").value;

    var f = new FormData();
    f.append("pid", product_id);
    f.append("pqty", product_qty.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "error") {

                alert("plaese signin first.");
            } else {
                window.location = "checkout.php?pid=" + t + "&" + "qty=" + product_qty;

            }
        }
    }
    r.open("POST", "checkOutProcess.php", true);
    r.send(f);

}

function changeInvoiceStatus(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (r.readyState == 4) {
                var t = r.responseText;
                // alert(t);

                window.location.reload();

            }
        }
    };
    r.open("GET", "changeInvoiceIdProcess.php?id=" + id, true);
    r.send();


}



function Image() {
    var image = document.getElementById("img");
    var pr = document.getElementById("pr");

    image.onchange = function() {
        var file0 = this.files[0];
        var ur10 = window.URL.createObjectURL(file0);

        pr.src = ur10;


    }

}

function userBlock(id) {



    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            window.location = "manageusers.php"
            alert(text);
        }

    };


    request.open("GET", "userBlockProcess.php?id=" + id, true);
    request.send();
}

function productBlock(id) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            window.location = "manageproducts.php"
                // alert(text);
        }

    };


    request.open("GET", "productBlockProcess.php?id=" + id, true);
    request.send();
}

function addproduct(id) {

    var category = document.getElementById("category");
    var qty = document.getElementById("qty");
    var model = document.getElementById("model");
    var colour = document.getElementById("colour");
    var price = document.getElementById("price");



    var description = document.getElementById("description");
    var image = document.getElementById("img");



    // alert(qty.value);
    // alert(model.value);
    // alert(colour.value);
    // alert(price.value);
    // alert(description.value);

    var form = new FormData();


    form.append("category", category.value);
    form.append("qty", qty.value);
    form.append("model", model.value);
    form.append("colour", colour.value);
    form.append("price", price.value);
    form.append("description", description.value);
    form.append("img", image.files[0]);

    // alert(id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            alert("Success");
            // alert(t);


        }
    };

    r.open("POST", "addProductProcess.php", true);
    r.send(form);


}

function pswd_addon() {

    var show_text = document.getElementById("show_text");
    var img_show = document.getElementById("img_show");
    var img_hide = document.getElementById("img_hide");

    var show = img_show.classList.toggle("d-none");
    var hide = img_hide.classList.toggle("d-none");

    if (hide == false) {

        show_text.type = "text";
        img_hide.className = "bi-eye-slash-fill";

    } else {

        show_text.type = "password";
        img_show.className = "bi-eye-fill";

    }
}


function changeImage() {

    var image = document.getElementById("profileimg");
    var prev = document.getElementById("prev0");

    image.onchange = function() {

        var file0 = this.files[0];
        var url0 = window.URL.createObjectURL(file0);
        prev.src = url0;
    }
}

function basicSearch(x) {
    var searchText = document.getElementById("search_txt").value;


    var form = new FormData();
    form.append("st", searchText);
    form.append("page", x);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            document.getElementById("result").innerHTML = t;
        }
    };
    r.open("POST", "basicSearchProcess.php", true);
    r.send(form);

}

function advancedSearch(x) {


    var category = document.getElementById("ca1");

    var model = document.getElementById("mo1");
    var condition = document.getElementById("co1");
    var colour = document.getElementById("col1");
    var priceFrom = document.getElementById("pf1");
    var priceTo = document.getElementById("pt1");


    var form = new FormData();
    form.append("page", x);

    form.append("ca", category.value);

    form.append("m", model.value);
    form.append("con", condition.value);
    form.append("col", colour.value);
    form.append("pf", priceFrom.value);
    form.append("pt", priceTo.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            document.getElementById("advanceresult").innerHTML = t;
        }
    }

    r.open("POST", "advancedSearchProcess.php", true);
    r.send(form);

}


function profileupdate() {


    var adline1 = document.getElementById("addline1");
    var adline2 = document.getElementById("addline2");
    var pcode = document.getElementById("postal");
    var image = document.getElementById("prev0");

    // alert(adline1.value);
    // alert(adline2.value);
    // alert(pcode.value);

    var form = new FormData();
    form.append("adline1", adline1.value);
    form.append("adline2", adline2.value);
    form.append("pcode", pcode.value);
    form.append("img", profileimg.files[0]);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);

        }
    };

    r.open("POST", "userprofileUpdateProcess.php", true);
    r.send(form);
}

function printInvoice() {

    var restorePage = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorePage;
}


//UpdateProductmodel
var pm;

function viewProductMoidel(id) {
    var m = document.getElementById("viewproductmodel" + id);
    pm = new bootstrap.Modal(m);
    pm.show();

}






function UpdateProduct(id) {

    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    // alert(qty);
    // alert(price);
    // alert(id);

    var f = new FormData();
    f.append("p", price);
    f.append("q", qty);
    f.append("i", id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            pm.hide();
            window.location = "ManageProducts.php";
        }
    };
    r.open("POST", "UpdateProductprocess.php", true);
    r.send(f);
}


//newmodel

var pm;


function viewModel() {
    var m = document.getElementById("newcatagory");
    pm = new bootstrap.Modal(m);
    pm.show();

}





function addnewmodel() {
    var nc = document.getElementById("i").value;

    // alert(nc);


    var f = new FormData();
    f.append("nc", nc);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "This model already exists") {
                alert(t);
            } else {
                alert(t);
                pm.hide();
                window.location = "Addproduct.php";
            }


        }
    };
    r.open("POST", "addnewmodelprocess.php", true);
    r.send(f);
}



//newcolour

var pm;


function viewcolourMoidel() {
    var m = document.getElementById("newcolour");
    pm = new bootstrap.Modal(m);
    pm.show();

}



function addnewcolour() {
    var c = document.getElementById("c").value;

    // alert(c);


    var f = new FormData();
    f.append("c", c);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "This colour already exists") {
                alert(t);
            } else {
                alert(t);
                pm.hide();
                window.location = "Addproduct.php";
            }


        }
    };
    r.open("POST", "addnewcolourprocess.php", true);
    r.send(f);
}