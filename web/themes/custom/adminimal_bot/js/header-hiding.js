(function ($, Drupal) {
    Drupal.behaviors.adminimalBOTheaderhiding = {
        attach: function (context, settings) {
            $("input[name$='field_page_options[0][value]']").click(function () {
                var radio_value = $(this).val();
                if (radio_value == 'basic_title') {
                    $("#headergrouparea").hide("slow");
                }
                else if (radio_value == 'banner_title') {
                    $("#headergrouparea").show("slow");

                }

            });
            $('[name="field_page_options[0][value]"]:checked').trigger('click');
        }
    };
})(jQuery, Drupal);