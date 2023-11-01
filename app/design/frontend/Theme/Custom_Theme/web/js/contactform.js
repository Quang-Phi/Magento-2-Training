define(["ko", "jquery", "uiComponent", "mage/translate"], function (
    ko,
    $,
    Component,
    $t
) {
    "use strict";
    return Component.extend({
        inputNameVal: ko.observable(""),
        inputEmailVal: ko.observable(""),
        inputMessageVal: ko.observable(""),
        errors: ko.observable({}),
        initialize: function () {
            this._super();
        },

        submitContact: function () {
            let form = $("form.contact-form");
            this.inputNameVal(form.find('input[name="name"]').val());
            this.inputEmailVal(form.find('input[name="email"]').val());
            this.inputMessageVal(form.find('textarea[name="message"]').val());
            if (this.checkValidated()) {
                this.sendRequest();
                return;
            }
            return false;
        },
        checkValidated: function () {
            this.errors({});
            if (this.inputNameVal() === "") {
                this.errors({
                    ...this.errors(),
                    name: $t("Name is required."),
                });
            } else if (!/^[\p{L}\p{Zs}]+$/u.test(this.inputNameVal())) {
                this.errors({
                    ...this.errors(),
                    name: $t("Name should only contain letters and spaces."),
                });
            }
        
            if (this.inputEmailVal() === "") {
                this.errors({
                    ...this.errors(),
                    email: $t("Email is required."),
                });
            } else if (!/\S+@\S+\.\S+/.test(this.inputEmailVal())) {
                this.errors({
                    ...this.errors(),
                    email: $t("Invalid email."),
                });
            }
        
            if (this.inputMessageVal() === "") {
                this.errors({
                    ...this.errors(),
                    message: $t("Message is required."),
                });
            }
        
            if (Object.keys(this.errors()).length === 0) {
                return true;
            } else {
                console.log(this.errors());
                return false;
            }
        },
        sendRequest: function () {
            let form = $("form.contact-form"),
                url = form.attr("action"),
                formData = new FormData(form[0]),
                inputNameVal = this.inputNameVal(),
                inputEmailVal = this.inputEmailVal(),
                inputMessageVal = this.inputMessageVal();
            $.ajax({
                url: url,
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                Headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    alert(
                        $t("Submitted successfully, data") + ": " +
                            ": \n" +
                            $t("Name") + ": " +
                            inputNameVal +
                            "\n" +
                            $t("Email") + ": " +
                            inputEmailVal +
                            "\n" +
                            $t("Message") + ": " +
                            inputMessageVal
                    );
                },
                error: function (response) {
                    alert(
                        $t("Submitted failed, data") + ": " +
                            "\n" +
                            $t("Name") + ": " +
                            inputNameVal +
                            "\n" +
                            $t("Email")+ ": " +
                            inputEmailVal +
                            "\n" +
                            $t("Message") + ": " +
                            inputMessageVal
                    );
                },
            });
        },
    });
});
