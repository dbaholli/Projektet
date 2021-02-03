const BtnSubmit = document.getElementById('Btn-submit')
const validoFormen = (ngjarje) => {

	const perdoruesi = document.getElementById('userid');
	const fjalkalimi = document.getElementById('pass');
	const emriPlot = document.getElementById('emri');
	const emailAdresen = document.getElementById('adresaEmailit');


	if (perdoruesi.value === "") {

		alert('Shto perdoruesin!');
		perdoruesi.focus();
		return false;
	}
	if (fjalkalimi.value === "") {

		alert('Shto fjalkalimin!');
		fjalkalimi.focus();
		return false;
	}
	if (emriPlot.value === "") {

		alert('Shto Emrin e Plote!');
		emriPlot.focus();
		return false;
	}
	if (emailAdresen.value === "") {

		alert('Shto e-mail adresen!');
		emailAdresen.focus();
		return false;
	}
	return true;
}
BtnSubmit.addEventListener('click', validoFormen);
});

