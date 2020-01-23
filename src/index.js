require('./style.css');
{
  const init = () => {
    console.log(`form`);
    const $form = document.querySelector(`form`);
    const fields = $form.querySelectorAll(`.input`);
    if ($form) {
      $form.noValidate = true;
      $form.addEventListener(`submit`, handleSubmitForm);
      addValidationListeners(fields);
    }


  };

  const handleSubmitForm = e => {
    const $form = e.currentTarget;
    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);

      $form.querySelector(`.error`).innerHTML = `Some errors occured`;
    } else {
      console.log(`Form is valid => submit form`);
    }
  };

  const showValidationInfo = $field => {
    let message;
    if ($field.validity.valueMissing) {
      message = `Required`;
    }
    if ($field.validity.typeMismatch) {
      message = `Type not right`;
    }
    if ($field.validity.rangeOverflow) {
      const max = $field.getAttribute(`max`);
      message = `Too big, max ${max}`;
    }
    if ($field.validity.rangeUnderflow) {
      const min = $field.getAttribute(`min`);
      message = `Too small, min ${min}`;
    }
    if ($field.validity.tooShort) {
      message = `Too short`;
    }
    if ($field.validity.tooLong) {
      message = `Too long`;
    }
    if (message) {
      $field.parentElement.querySelector(`.error`).textContent = message;
    }
  };

  const handeInputField = e => {
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      $field.parentElement.querySelector(`.error`).textContent = ``;
      if ($field.form.checkValidity()) {
        $field.form.querySelector(`.error`).innerHTML = ``;
      }
    }
  };

  const handeBlurField = e => {
    console.log(`hallo`);
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    fields.forEach($field => {
      $field.addEventListener(`input`, handeInputField);
      $field.addEventListener(`blur`, handeBlurField);
    });
  };

  init();
}
