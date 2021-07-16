export default class Gate{

    constructor(user) {
        this.user = user;
    }
    isAgentTC(){
        return this.user.usertable_type ==='AgentTC';
    }
    isIntervenant(){
        return this.user.usertable_type ==='Intervenant';
    }
    isChargePrj(){
        return this.user.usertable_type ==='ChargePrj';
    }
    isDirecteur(){
        return this.user.usertable_type ==='Directeur';
    }
    isAdmin(){
        return this.user.usertable_type ==='Admin';
    }

}
