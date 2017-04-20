window.onload = function(){
    
            var objLi = $('.item_list_serch');
            var objLi2 = $('.item_list_serch_object');
          
            $('body').click(function(e){
                var a = e.target.className;
                if(a == 'div_select' || a == 'div_select_text' || a == 'div_select_arrow' || a == 'div_select_list_serch_input' || a == 'div_select_list_serch_ico'){
                    $('#list_block').css({left:'-1px'});    
                }
                else if(a == 'item_list_serch'){
                    var d = e.target.innerHTML;
                    var id = e.target.id;
                    id = id.slice(6);
                    $('.div_select_text').html(d);
                    $('#object_end').attr('value',id);
                    $('#list_block').css({left:'-9999px'});
                    $('#input_serch').attr('value','');
                    var li = '';
                    for(var i=0;i < objLi.length; i++){
                        var d = objLi[i].innerHTML;
                        var id = objLi[i].id;
                        id = id.slice(6);
                        li = li + '<li class="item_list_serch" id="serch_'+ id +'">'+d+'</li>';                      
                    }
                    $('.list_serch').html(li);
                }
                else{
                    $('#list_block').css({left:'-9999px'});    
                }
                if(a != 'search_list_object'){
                    $('.search_list_object').css({display:'none'});    
                }
            });
            
            $('#input_serch').keyup(function(){
                var a = $('#input_serch').attr('value');
                var g = a.toLocaleLowerCase();
                var b = a.length;
                var li = '';                
                if(b > 2){
                    for(var i=0;i < objLi.length; i++){
                        var d = objLi[i].innerHTML;
                        var e = d.toLocaleLowerCase();
                        var id = objLi[i].id;
                        id = id.slice(6);
                        if(e.indexOf(g)!= -1){
                            li = li + '<li class="item_list_serch" id="serch_'+ id +'">'+d+'</li>';    
                        }                       
                    }
                    $('.list_serch').html(li);   
                }
                else{
                    for(var i=0;i < objLi.length; i++){
                        var d = objLi[i].innerHTML;
                        var id = objLi[i].id;
                        id = id.slice(6);
                        li = li + '<li class="item_list_serch" id="serch_'+ id +'">'+d+'</li>';                      
                    }
                    $('.list_serch').html(li);    
                } 
            });
            
            
            $('#serch_object').keyup(function(){
                var a = $('#serch_object').attr('value');    
                var g = a.toLocaleLowerCase();
                var b = a.length;
                var li = '';

                if(b > 2){                
                    for(var i=0;i < objLi2.length; i++){
                        var d = objLi2[i].firstChild.innerHTML;
                        var e = d.toLocaleLowerCase();
                        var alias = objLi2[i].firstChild.getAttribute('href');
                        var classN = objLi2[i].firstChild.getAttribute('class');
                        if(e.indexOf(g)!= -1){
                            li = li + '<li class="item_list_serch_object"><a class="'+classN+'" href="'+alias+'">'+d+'</a></li>';    
                        }                       
                    }
                    $('.list_serch_object').html(li);
                    $('.search_list_object').css({display:'block'});
                }
                else{
                    $('.search_list_object').css({display:'none'});     
                }
            });
            
            
            
            $('.lk_pen+a').toggle(function(){
                var id = this.id;
                id = id.slice(5);
                $.post( "../jsphp/phonemute.php", {id: id},function(res){
                    if(res == '1'){
                        if($('#mute_'+id).hasClass('lk_email_on')){
                            $('#mute_'+id).removeClass('lk_email_on');
                            $('#mute_'+id).addClass('lk_email_off');
                            $('#mute_'+id).attr('title','Оповещение по E-mail выключено');
                        }
                        else{
                            $('#mute_'+id).removeClass('lk_email_off');
                            $('#mute_'+id).addClass('lk_email_on');
                            $('#mute_'+id).attr('title','Оповещение по E-mail включено');   
                        }
                    }
                });
                       
            },function(){
                var id = this.id;
                id = id.slice(5);
                $.post( "../jsphp/phonemute.php", {id: id},function(res){
                if(res == '1'){
                        if($('#mute_'+id).hasClass('lk_email_on')){
                            $('#mute_'+id).removeClass('lk_email_on');
                            $('#mute_'+id).addClass('lk_email_off');
                            $('#mute_'+id).attr('title','Оповещение по E-mail выключено');
                        }
                        else{
                            $('#mute_'+id).removeClass('lk_email_off');
                            $('#mute_'+id).addClass('lk_email_on');
                            $('#mute_'+id).attr('title','Оповещение по E-mail включено');   
                        }
                    }    
                });
            });
            
            $('.lk_update_phone').click(function(){
                var id = this.id;
                id = id.slice(7);
                $.post( "../jsphp/updatetime.php", {id: id},function(res){
                    if(res != ''){
                        $('#update_'+id).html(res);
                        $('#update_'+id).removeClass('lk_update_phone');
                        $('#update_'+id).addClass('lk_update_phone_in');                            
                        $('#update_'+id).attr('id','');                            
                    }
                });
            });
            
			var a = document.getElementsByTagName('DIV');
			for(var i = 0; i < a.length; i++){
				if(a[i].className == 'span3'){
					a[i].onmouseover = function(){
						this.className = 'span3 bg';
					}
					a[i].onmouseout = function(){
						this.className = 'span3';	
					} 	
				}
			}
			var b = document.getElementsByTagName('A');
			for(var i = 0; i < b.length; i++){
				if(b[i].className == 'gallery_video'){
					b[i].onmouseover = function(){
						this.className = 'gallery_video bg';
					}
					b[i].onmouseout = function(){
						this.className = 'gallery_video';	
					} 	
				}
			}
			$(function(){
				var d = $('.izbr');
				var e = $('.izbr+span');
				d.click(function(){
					if(e.css('backgroundPositionY') == '-15px'){
						e.css({backgroundPositionY: '+=15'});
						d.text('В избранное');
					}
					else{
						e.css({backgroundPositionY: '-=15'});
						d.text('Убрать из избранного');
					}					
				});	
                
                $('.img_ioop').hover(function(){
                    $(this).css({maxWidth:'none'}).animate({width: '+=20',height:'+=20',top: '-=10',left:'-=10'},150);
                },function(){
                    $(this).animate({width: '-=20',height:'-=20',top: '+=10',left:'+=10'},150);
                });
			});
            
            $('.history_prise li').click(function(){
                $('.history_prise li').removeClass('activ_s');
                $(this).addClass('activ_s');
                var t = $(this).attr('title');
                $('#info_prise').text(t);   
            });          
            
            $('.span4_icon_item').hover(function(){
                var twd = $(this).children('div');
                tw = twd.css('width');
                tw = tw.replace('px','')/2-7;
                twd.css({'left':'-'+tw+'px','display':'block'});
            },function(){
                $(this).children('div').css({'display':'none'});
            });
            
            $('.span5_icon_item').hover(function(){
                var twd = $(this).children('div');
                tw = twd.css('width');
                tw = tw.replace('px','')/2-7;
                twd.css({'left':'-'+tw+'px','display':'block'});
            },function(){
                $(this).children('div').css({'display':'none'});
            });
            
            $('.span4_content h1 span').click(function(){
                if($(this).hasClass('pols')){
                     $(this).removeClass('pols');   
                }
                else{$(this).addClass('pols');}
            });
            
            $('.span5_content h1 span').click(function(){
                if($(this).hasClass('pols')){
                     $(this).removeClass('pols');   
                }
                else{$(this).addClass('pols');}
            });
            
            $('.add_comment').fancybox({
                "hideOnContentClick" : false,
                "padding" : 20,
                "frameWidth" : 650,
                "frameHeight" : 226,
                "overlayOpacity" : 0.8,
                "centerOnScroll" : false
            });
            
            $("a.gallery_video").fancybox({
                "hideOnContentClick" : false,
            	"padding" : 10,
            	"frameWidth" : 853,
            	"frameHeight" : 480,
            	"overlayOpacity" : 0.8,
            	"centerOnScroll" : false
            	});
                
                $("a.gallery, a.iframe").fancybox();		
                    url = $("a.modalbox").attr('href');
                    $("a.modalbox").attr("href", url);	
                    $("a.modalbox").fancybox({								  
			             "frameWidth" : 400,	 
			             "frameHeight" : 400 								  
                });

		}
        
                        
        function reload_capcha(){
            $('#capcha').html('<img src="../capcha.php" class="img_capcha" onclick="reload_capcha()"/>');
        }
        
        function addMainIsbr(param){
            $.post('http://novo2/jsphp/add_main.php',{id:param},function(data){
                $('#izbr').html(data);   
            });
        }
        
        function newcomment(id,otvet,type){    
            var id = id;
            var otvet = otvet;
            var type = type;
            var user = $('#usernamecomm').val();
            var text = $('#textotziv').val();
            $.post( "../jsphp/newcomment.php", {id: id, text: text, otvet: otvet, user: user, type:type},function(data){
                $('#formcomment').html(data);
                $.post('../comment/upcomment.php',{id:id, type:type},function(data2){
                    $('#commetlist').html(data2);
                });
            });            
        }
        
        function sortDate(k,date1,date2){    
            var k = k;
            var date1 = date1;
            var date2 = date2;
            $.post( "../jsphp/sort_stat.php", {k: k, date1: date1, date2: date2},function(dataSortDate){
                $('#main_static').html(dataSortDate);
            });            
        }
        
        function dateCal(k){
            var k = k;
            var text = $('#datepicker').attr('value');
            $.post( "../jsphp/sort_stat2.php", {k: k, text: text},function(dataSortDate2){
                $('#main_static').html(dataSortDate2);
            });            
        }
        
        function addstar(idnovo,linestar,star){
            $('#starimg_'+linestar).css({'display':'inline'});
            $('#starul_'+linestar).css({'display':'none'});
            $.post( "../jsphp/addstar.php", {id: idnovo, linestar: linestar, star: star},function(dataStar){
                $('#reiting').html(dataStar);
                $('#starul_'+linestar).show(300);
            });
        }
        
        function subForm(){
            var val = $('#email_mail_sub').val();
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            if(pattern.test(val)){
                return true;    
            }
            else{
                $('#email_mail_sub').addClass('error_sub_email');
                return false;
            }
        }
        