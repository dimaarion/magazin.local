$(document).ready(function () {
	let num = ['0','1','2','3','4','5','6','7','8','9','10'];

	let en_m = [
		'a', 'b', 'v', 'g', 'd',
		'e', 'e', 'zh', 'z', 'i',
		'y', 'k', 'l', 'm', 'n',
		'o', 'p', 'r', 's', 't',
		'u', 'f', 'h', 'c', 'ch',
		'sh', 'sch', '', 'y', '',
		'e', 'yu', 'ya', '-'
	];
	let ru_m = [
		'а', 'б', 'в', 'г', 'д', 'е',
		'ё', 'ж', 'з', 'и', 'й', 'к',
		'л', 'м', 'н', 'о', 'п', 'р',
		'с', 'т', 'у', 'ф', 'х', 'ц',
		'ч', 'ш', 'щ', 'ь', 'ы', 'ъ',
		'э', 'ю', 'я', ' '
	];
	let ru_b = [
		'А', 'Б', 'В', 'Г', 'Д', 'Е',
		'Ё', 'Ж', 'З', 'И', 'Й', 'К',
		'Л', 'М', 'Н', 'О', 'П', 'Р',
		'С', 'Т', 'У', 'Ф', 'Х', 'Ц',
		'Ч', 'Ш', 'Щ', 'Ь', 'Ы', 'Ъ',
		'Э', 'Ю', 'Я',' '
	]
	
	let en = en_m.concat(en_m, num);
	let ru = ru_m.concat(ru_b, num);
	$('#names').bind('input', function (e) {
		function grtReplaceInput(e, en, ru) {
			let d = [];
			let txt = e.target.value.split('');
			//ru
			let df = txt.map(function (x, i) { return ru.indexOf(x) });
			//en
			let dfe = txt.map(function (x, i) { return en.indexOf(x) });
			for (var i = 0; i < 100; i++) {
				if (en[df[i]] !== undefined) {
					d[i] = en[df[i]];
				}
				if (en[dfe[i]] !== undefined) {
					d[i] = en[dfe[i]];
				}
			}
			if (d.join('') == 'Glavna' || d.join('') == 'glavna') {
				return '/';
			} else {
				return d.join('');
			}

		}

		$('#alias').val(grtReplaceInput(e, en, ru))
	});
	$('.new_menu_category_input')
		.click(function (e) {
			$('#new_menu_category').css({ display: 'block' });

			console.log($('#new_menu_category'))
		});
	$('#new_menu_category div').click(function (e) {
		$('#new_menu_category').css({ display: 'none' });
		$('.new_menu_category_parent_input').val($.trim(e.target.innerText));
		$('.new_menu_category_parent').val($.trim($(this).children('.new_menu_category_linck').text()));


	});




});