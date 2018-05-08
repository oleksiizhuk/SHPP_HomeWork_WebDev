const ATM = {
	is_auth: false, 
	current_user: false, // 
	current_type: false, //
	current_log: {logs: []},
	log: "",
	// all cash of ATM
	cash: 2000,
	// all available users
	users: [
		{number: "0000", pin: "000", debet: 0, type: "admin", name: "Admin"}, // EXTENDED
		{number: "0025", pin: "123", debet: 675, type: "user", name: "Oleksii"},
		{number: "0026", pin: "222", debet: 1000, type: "user", name: "Aleksandr"},
		{number: "7777", pin: "777", debet: 100000, type: "user", name: "Yura"},
		{number: "8888", pin: "888", debet: 100001, type: "user", name: "Nastya"}
	],
	// authorization
	auth: function(number, pin) {
		if ( !this.is_auth ) {
			const numberOfUsers = this.users.length;
			for( let i = 0; i < numberOfUsers; i++ ){
				if ( this.users[i].number === number && this.users[i].pin === pin ){
					this.is_auth = !this.is_auth;
					this.current_user = i;
					this.current_type = this.users[i].type;
					console.log(`Добрый день ${this.users[i].name}, вы успешно авторизовались.`);
					let log = `${this.users[i].name}, успешно авторизованы.`;
					this.logs(log);
					return;
				}
			}  
		console.log("Не верный логин или пароль");
		} 
		else {
			console.log("Вы уже авторизованы"); 
			return;
		}		
	},
	// check current debet user проверить баланас  +
	check: function() {
		if ( this.checkCurrentType() !== "user" ) {
			const act = "проверить баланс";
			this.errLog(act, 3);
			return;
		}
			console.log(`На вашем балнсе: ${this.users[this.current_user].debet}`);
			this.log = `${this.users[this.current_user].name}, проверил свой баланс.`;
			this.logs(this.log);
	},

	// get cash - available for user only   
	getCash: function(amount) { 
		if( this.checkCurrentType() !== "user" ){
			const act = "снять деньги";
			this.errLog(act, 3);
			return;
		}
		if ( !this.checkMoney(amount) ) {
			const act = "снять деньги";
			this.errLog(act, 4);
			return;
		}
 		if( amount > this.users[this.current_user].debet ) {
 			console.log(`У вас не хватает денег для снятий, у Вас на балансе: ${this.users[this.current_user].debet}`);
 			this.log = `${this.users[this.current_user].name}, не смог снять деньги, сумма больше чем на баланся.`;
			this.logs(this.log);
 			return;
 		}
 		if( amount > this.cash ) {
 			console.log(`В банкомате нету столько, вы можете снять: ${this.cash}`);
 			this.log = `${this.users[this.current_user].name}, не смог снять деньги, сумма больше чем в банкомате.`;
			this.logs(this.log);
 			return;
 		}
 			console.log(`получите ваши деньги: ${amount} гривень,`);
 			this.users[this.current_user].debet -= amount;
 			this.cash -= amount;
 			this.log = `${this.users[this.current_user].name}, снял ${amount} грн.`;
			this.logs(this.log);
	},

	// положить деньги на баланс пользователя
	loadCash: function(amount){
		if ( this.checkCurrentType() !== "user" ) {
			const act = "положить деньги на счёт";
			this.errLog(act, 3);
			return;
		} 
		if ( !this.checkMoney( amount ) ) {
			const act = "положить деньги на счёт";
			this.errLog(act, 4);
			return;
		}
 			this.users[this.current_user].debet += amount;
 			console.log(`Вы успешло положили: ${amount} грн, Пожалуйста проверте свой баланс :)`);
 			this.log = `${this.users[this.current_user].name}, положил ${amount} грн.`;
			this.logs(this.log);
	},

	// load cash to ATM - available for admin only - EXTENDED  добавить деньги в ATM только для админа
	load_cash: function(addition) { 
 		if ( this.checkCurrentType() !== "admin" ){ 
			const act = "положить деньги в банкомат";
			this.errLog(act, 2);
			return;
 		}
 		if ( !this.checkMoney (addition) ) {
 			const act = "положить деньги в банкомат";
			this.errLog(this.current_type, act);
			return;
 		}
		this.cash += addition;
 		console.log(`Поздравляю вы положили на счет: ${addition} грн. В банкомате ${this.cash} грн`);
 		this.log = `${this.users[this.current_user].name}, Администратор, положил в банкомат: ${addition} грн.`;
		this.logs(this.log);
		
	},
	//** get report about cash actions - available for admin only - EXTENDED она только показует **//
	getReport: function() { 
		if ( this.checkCurrentType() !== "admin" ){
			const act = "посмтреть логи";
			this.errLog(act, 2);
			return;
		}
		this.log = `${this.users[this.current_user].name}, посмотрел логи ;).`;
		this.logs(this.log);
		console.log(this.current_log.logs);
	},
	//** log out **//
	logout: function() {
		if ( this.checkCurrentType () === false ){
			const act = "разлогироваться";
			this.errLog( act, 1 );
			return;
		}
			console.log(`Вы разлогинились. Хорошего Вам дня ${this.users[this.current_user].name} ;-)`);
			this.log = `${this.users[this.current_user].name}, Разлогинился;).`;
			this.logs(this.log);
			this.is_auth = false;
			this.current_user = false;
			this.current_type = false;
	},
	checkCurrentType: function() { 
		if( !this.is_auth ) { 
			return false;
		} 
		return this.current_type;
	},

	checkMoney: function(money){
		if ( typeof(money) === "number" && money > 0  && Number.isInteger(money) ) {
			return true;
		} 
		return false;
	},
		errLog: function (act, numberErr) { // 1 - не авторизированный, 2 - только для админа, 3 - только для user, 4 - деньги ,
			switch (numberErr) {
				case 1:
					console.log("Вы не залогинились, вы не можете работать с банкоматом !!!");
					this.log = `Не авторизованный: пытался воспользоваться функциями банкомата: ${act} .`;
					this.logs(this.log);
					break;
				case 2:
					console.log("Только администратор может пользоваться данной функцией")
					this.log = `${this.current_type}: Пытались воспользоваться функциями администратора, ${act}.`;
					this.logs(this.log);
					break;
				case 3:
					console.log("Только пользователи могут пользоваться данной функцией");
					this.log = `${this.current_type}: не успешная попытка ${act}.`;
					this.logs(this.log);
					break;
				case 4:
					console.log("не верный формат денег !!!");
					this.log = `${this.current_type}: не верный  ${act} .`;
					this.logs(this.log);
					break;				
				default:
					break;
			}
	},
		// функция для записи в базу логов
	logs: function(log){
		let d = new Date();
		this.current_log.logs.push(`${d.toUTCString()} -  ${log} \n`);
		
	}
};
