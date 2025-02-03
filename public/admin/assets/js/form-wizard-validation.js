/**
 *  Form Wizard
 */

'use strict';

(function() {
    const select2 = $('.select2'),
        selectPicker = $('.selectpicker');

    // Wizard Validation
    // --------------------------------------------------------------------
    const wizardValidation = document.querySelector('#wizard-validation');
    if (typeof wizardValidation !== undefined && wizardValidation !== null) {
        // Wizard form
        const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
        // Wizard steps
        const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details-validation');
        const wizardValidationFormStep2 = wizardValidationForm.querySelector('#case-description-validation');
        const wizardValidationFormStep3 = wizardValidationForm.querySelector('#case-need-validation');
        // Wizard next prev button
        const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
        const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

        const validationStepper = new Stepper(wizardValidation, {
            linear: true
        });

        // Account details
        const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'The name is required' : 'الاسم مطلوب'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: document.documentElement.lang === 'en' ? 'The name must be more than 6 and less than 30 characters long' : 'يجب أن يكون الاسم أكثر من 6 أحرف وأقل من 30 حرفًا'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9\u0600-\u06FF ]+$/,
                            message: document.documentElement.lang === 'en' ? 'The name can only consist of alphabetical, number and space' : 'الاسم يمكن أن يتكون فقط من حروف أبجدية وأرقام ومسافة'
                        }
                    }
                },
                phone: {
                    validators: {

                        stringLength: {
                            min: 11,
                            max: 11,
                            message: document.documentElement.lang === 'en' ? 'The phone number must be 11 characters long' : 'يجب أن يكون رقم الهاتف 11 حرفًا'
                        },
                        regexp: {
                            regexp: /^01[0125][0-9]{8}$/,
                            message: document.documentElement.lang === 'en' ? 'The value is not a valid phone number' : 'القيمة ليست رقم هاتف صحيح'
                        }
                    }
                },
                region_id: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'the Address is required' : ' العنوان مطلوب'
                        },

                    }
                },
                gender: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'the gender is required' : ' الجنس مطلوب'
                        },

                    }
                },

            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            },
            init: instance => {
                instance.on('plugins.message.placed', function(e) {
                    //* Move the error message out of the `input-group` element
                    if (e.element.parentElement.classList.contains('input-group')) {
                        e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
                    }
                });
            }
        }).on('core.form.valid', function() {
            validationStepper.next();
        });

        // Bootstrap Select (i.e Language select)
        if (selectPicker.length) {
            selectPicker.each(function() {
                var $this = $(this);
                $this.selectpicker().on('change', function() {
                    FormValidation2.revalidateField('gender');
                });
            });
        }

        // select2
        if (select2.length) {
            select2.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this
                    .select2({
                        dropdownParent: $this.parent()
                    })
                    .on('change', function() {
                        // Revalidate the color field when an option is chosen
                        FormValidation2.revalidateField('region_id');
                    });
            });
        }


        // Personal info
        const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
            fields: {
                title_ar: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'The Arabic Title is required' : 'العنوان العربي مطلوب'
                        },
                        // regexp: {
                        //     regexp: /^[\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\s\w@#$%^&*()_+\-=\[\]\{\};:'",<>\./?\\|`~]*$/,
                        //     message: document.documentElement.lang === 'en' ? 'The Arabic Title can contain any character' : 'العنوان العربي يمكن أن يحتوي على أي علامة أو حرف'
                        // }
                    }
                },
                title_en: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'The English Title is required' : 'العنوان الإنجليزي مطلوب'
                        },
                        // regexp: {
                        //     regexp: /^[A-Za-z0-9\s@#$%^&*()_+\-=\[\]\{\};:'",<>\./?\\|`~]*$/,
                        //     message: document.documentElement.lang === 'en' ? 'The English Title can contain any character' : 'العنوان الإنجليزي يمكن أن يحتوي على أي علامة أو حرف'
                        // }
                    }
                },

                is_event: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'the gender is required' : ' الجنس مطلوب'
                        },

                    }
                },
                category_case_id: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'the Category is required' : ' القسم مطلوب'
                        },

                    }
                },
                priority: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'the priority is required' : '  مطلوب'
                        },

                    }
                },
                repeating: {
                    validators: {
                        notEmpty: {
                            message: document.documentElement.lang === 'en' ? 'the repeating is required' : '  مطلوب'
                        },

                    }
                },
                // volunteer_id: {
                //     validators: {
                //         notEmpty: {
                //             message: document.documentElement.lang === 'en' ? 'the repeating is required' : '  مطلوب'
                //         },

                //     }
                // },



            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            }
        }).on('core.form.valid', function() {
            // Jump to the next step when all fields in the current step are valid
            validationStepper.next();
        });

        // Bootstrap Select (i.e Language select)
        // if (selectPicker.length) {
        //     selectPicker.each(function() {
        //         var $this = $(this);
        //         $this.selectpicker().on('change', function() {
        //             FormValidation2.revalidateField('volunteer_id');
        //         });
        //     });
        // }

        // select2
        // if (select2.length) {
        //     select2.each(function() {
        //         var $this = $(this);
        //         $this.wrap('<div class="position-relative"></div>');
        //         $this
        //             .select2({

        //                 dropdownParent: $this.parent()
        //             })
        //             .on('change', function() {
        //                 // Revalidate the color field when an option is chosen
        //                 FormValidation2.revalidateField('volunteer_id');
        //             });
        //     });
        // }

        // Social links
        const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
            fields: {

            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            }
        }).on('core.form.valid', function() {

        });

        wizardValidationNext.forEach(item => {
            item.addEventListener('click', event => {
                switch (validationStepper._currentIndex) {
                    case 0:
                        FormValidation1.validate();
                        break;

                    case 1:
                        FormValidation2.validate();
                        break;

                    case 2:
                        FormValidation3.validate();
                        break;

                    default:
                        break;
                }
            });
        });

        wizardValidationPrev.forEach(item => {
            item.addEventListener('click', event => {
                switch (validationStepper._currentIndex) {
                    case 2:
                        validationStepper.previous();
                        break;

                    case 1:
                        validationStepper.previous();
                        break;

                    case 0:

                    default:
                        break;
                }
            });
        });
    }
})();
