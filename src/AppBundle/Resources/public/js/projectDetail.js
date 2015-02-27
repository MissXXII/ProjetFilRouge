jQuery(document).ready(function () {
	jQuery.expr[':'].regex = function (elem, index, match) {
		var matchParams = match[3].split(','),
				validLabels = /^(data|css):/,
				attr = {
					method: matchParams[0].match(validLabels) ?
							matchParams[0].split(':')[0] : 'attr',
					property: matchParams.shift().replace(validLabels, '')
				},
		regexFlags = 'ig',
				regex = new RegExp(matchParams.join('').replace(/^s+|s+$/g, ''), regexFlags);
		return regex.test(jQuery(elem)[attr.method](attr.property));
	};

	$('[data-toggle="tooltip"]').tooltip({
		animated: 'fade'
	});

	// toggle edit/view display
	var state = 'view';
	$('#editSkillButton').click(function (e) {
		e.preventDefault();
		if (state === 'edit') {													// Générer l'affichage de vue
			state = 'view';
			$('.inactiveSkill').each(function () {
				$(this).removeClass('visible').addClass('hidden');
			});
			$('#skillContainer').addClass('view').removeClass('edit');
			$('span#skillCtrl').addClass('hidden').removeClass('visible');
		} else if (state === 'view') {											// Générer l'affichage d'édition
			state = 'edit';
			$('.inactiveSkill').each(function () {
				$(this).removeClass('hidden').addClass('visible');
			});
			$('#skillContainer').addClass('edit').removeClass('view');
			$('span#skillCtrl').addClass('visible').removeClass('hidden');
		}



	});
});
