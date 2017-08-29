function EventListener(url, last_check, function_done, function_fail) {
    var self = this;
    this.url = url;
    this.last_check = last_check;
    this.function_done = function_done;
    this.function_fail = function_fail;
    //console.log(url, last_check);
    
    //var timeStampInMs = window.performance && window.performance.now && window.performance.timing && window.performance.timing.navigationStart ? window.performance.now() + window.performance.timing.navigationStart : Date.now();
    //console.log(timeStampInMs, Date.now());
    
    this.espera = 1;
    this.count = 0;
        

    
    
    this.llamada = function (){
        setTimeout(function(){
            self.llamadaAjax()
        },self.espera * 1000);
    }
        
    this.llamadaAjax = function(){
        console.log('llamada ajax , count='+self.count+' , last_check='+self.last_check);
        self.count++;
        //console.log('>>>>'+self.url);
        $.ajax({
            url: url+'&event=evento_turno&last_check='+self.last_check, 
            data: $(this).serialize(),
            type: 'GET',
        })
        .done(function(data){
            self.function_done(JSON.parse(data));
            self.llamada();
        })
        .fail(function(){
            self.function_fail();
            self.llamada();
        });
    }
    
}