/*function restrictCheckboxSelection1(checkbox) {
    var checkboxes = document.getElementsByName('departamento[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] !== checkbox) {
                    checkboxes[i].checked = false;
                }
            }
}

function restrictCheckboxSelection2(checkbox) {
    var checkboxes = document.getElementsByName('prioridad[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] !== checkbox) {
                    checkboxes[i].checked = false;
                }
            }
}

function validarFormulario() {
    var checkboxesDepartamento = document.querySelectorAll('input[name="departamento[]"]');
    var checkboxesPrioridades = document.querySelectorAll('input[name="prioridad[]"]');
    var isCheckedDepartamento = false;
    var isCheckedPrioridades = false;

    for (var i = 0; i < checkboxesDepartamento.length; i++) {
        if (checkboxesDepartamento[i].checked) {
            isCheckedDepartamento = true;
            break;
        }
    }

    for (var j = 0; j < checkboxesPrioridades.length; j++) {
        if (checkboxesPrioridades[j].checked) {
            isCheckedPrioridades = true;
            break;
        }
    }

    if (!isCheckedDepartamento) {
        alert('Por favor, seleccione al menos una opción de departamento.');
        return false;
    }

    if (!isCheckedPrioridades) {
        alert('Por favor, seleccione al menos una opción de prioridades.');
        return false;
    }

    return true;
}*/