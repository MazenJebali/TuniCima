const Settings = {
    data() {
        return {
        }
    },
    methods: {
        AuthentificationCheck() {
            var DATAvalidation = true;
            var alerts = "";
            const specialChars = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            if (specialChars.test(document.getElementById("user").value) ||  document.getElementById("user").value.length < 3) {
                alerts += "* user must be at least 3 characters long and do not contain special any characters." + "<br>";
                DATAvalidation = false;
            }
            if (document.getElementById("password").value.length != 8) {
                alerts += "* password length should be equal to 8." + "<br>";
                DATAvalidation = false;
            }
            if (!specialChars.test(document.getElementById("password").value)) {
                alerts += "* password must contain at least one special character." + "<br>";
                DATAvalidation = false;
            };

            if (!DATAvalidation) {
                document.getElementById('alert').style.display = "block";
                document.getElementById('alert').innerHTML = alerts;
            } else {document.getElementById('alert').style.display = "none";}
            document.getElementById('submitButton').disabled = !DATAvalidation;
        },
        NewAccountCheck() {
            var DATAvalidation = true;
            var alerts = "";
            const specialChars = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            if (specialChars.test(document.getElementById("user").value) || document.getElementById("user").value.length < 3) {
                alerts += "* user must be at least 3 characters long and do not contain  any special characters." + "<br>";
                DATAvalidation = false;
            }
            if (document.getElementById("password").value.length != 8) {
                alerts += "* password length should be equal to 8." + "<br>";
                DATAvalidation = false;
            }
            if (!specialChars.test(document.getElementById("password").value)) {
                alerts += "* password must contain at least one special character." + "<br>";
                DATAvalidation = false;
            };
            if (document.getElementById("password").value != document.getElementById("confirm_password").value) {
                alerts += "* Please Retype your password." + "<br>";
                DATAvalidation = false;
            };

            if (!DATAvalidation) {
                document.getElementById('alert').style.display = "block";
                document.getElementById('alert').innerHTML = alerts;
            } else {document.getElementById('alert').style.display = "none";}
            document.getElementById('submitButton').disabled = !DATAvalidation;
        },
        show_table(ID) {
            var IDlist = ["admins","history","users","contents"];
            for (let index = 0; index < IDlist.length; index++) {
                (ID == IDlist[index])?
                    document.getElementById(IDlist[index]).style.display = "block":
                    document.getElementById(IDlist[index]).style.display = "none";
            }
        },
        show_access(ID) {
            (document.getElementById(ID).style.display == "block")?
                document.getElementById(ID).style.display = "none":
                document.getElementById(ID).style.display = "block";
        }
    }
};