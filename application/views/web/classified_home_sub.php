  <?php if(isset($_GET['status'])){
	 
	 
	 
	 echo '<div class="alert alert-success">Your Message Sucessfully Sent.</div>'; }?>
	 
	 
<div class="col-lg-8 col-sm-6 content-right">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link href="<?php echo base_url() ?>css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/owl.theme.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
<script src="<?php echo base_url() ?>js/owl.carousel.js"></script>

   <style>
   .well2 {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
}
.well2:hover {
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.08);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.08);
}
.list-detail tr{
	margin-bottom:20px;
}

.list-detail tr:nth-child(odd){
	background-color:#F1F8E5;
	border:1px solid #ddd;
}
.list-detail tr:nth-child(even){
	background-color:#E8F3F5;
	border:1px solid #ddd;
}
.list-detail p{
	border-bottom:1px dashed #ddd;
}
 
   
   </style>

<hr />


<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
 <div class="well">
        <form method="get" action="<?php echo base_url() ?>index.php/classified_ads/ads/">
          
          <div id="search" class="form-group">
<input type="text" name="s" value="<?php if(isset($_GET['s'])){echo $_GET['s']; } ?>" class="form-control input-lg" placeholder="Search" />
 
 
</div>
<div class="clearfix"></div>
            
<div class="form-group">
<button type="submit" class="btn btn-default btn-primary btn-lg btn-block">SEARCH</button>

</div>
           
           
        </form>
        
        </div>
      </div>

 <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
 
 
 
<div class="well" style="background-color:transparent;">

<div id="demo">
        
  <div id="owl-demo" class="owl-carousel">
                <?php  if ($ads != null) {
					
                    foreach ($ads as $ads12) { ?>
                <div class="item"><a href="<?php echo base_url();?>index.php/classified_ads/ads/?school_name=<?php echo $ads12->school_name; ?>"> <img src="<?php echo base_url().$ads12->school_imag;?>" width="120" height="120" /> </a></div>
                <?php } }?>
               
                
                 
              </div>
              

            
    </div>
    
     


</div>


</div>

          <ol class="breadcrumb">
		  
		 
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>index.php/classified_ads/index">Classified Ads</a></li>
          </ol>
     
         <br>
          <div class="row classifieds-table">
            <div class="col-lg-16">
              <table class=" list-detail " width="100%">
                <tbody>
                <?php
                if ($ads != null) {
					
                    foreach ($ads as $ads) {
						
                    ?>
                    <tr>
                        <td class=" ">
                        
						<?php
                            $url= base_url().'index.php/classified_ads/details/'.preg_replace("![^a-z0-9]+!i", "-", $ads->ads_id.' '.$ads->title);
                            ?>
                          <div class="media" style="cursor: pointer;" onclick="window.location.href='<?php echo $url; ?>'">
                          <div class="xx12 col-md-4 col-xs-2 col-sm-12">
                            
                                <?php
                                if($ads->img_1=='no'){

                                }else{
                                ?><a class="thumbnail pull-left"  href="<?php echo $url; ?>">
                              <img class="media-object w100" style="max-height: 180px;" src="<?php echo base_url().$ads->img_1; ?>" /></a>
                            <?php
                                }
                                ?>
                                    
                                    <div class="clearfix"></div>
                                    </div>
                                    <div class="xx12 col-md-6 col-sm-12 col-xs-8 ">
                            <div class="media-body">
                              <h4 class="media-heading"><a href="<?php echo $url; ?>" > <?php echo $ads->title; ?></a></h4> 
							 <P>ISBN No: <?php echo $ads->isbn; ?></P>
                             <P>Author: <?php echo $ads->cus_name; ?></P>
                             <P>Date: <?php echo $ads->date; ?></P>
                              <P>Price: <strong><?php if($ads->price)echo 'USD '.$ads->price; ?></strong></P>
                             <P><?php
echo substr(strip_tags($ads->description),0,50).'....';
?> </P>
                             
                              <p><?php echo $ads->date;echo' , ';echo $ads->area;echo' , ';echo $ads->category; ?></p> 
                             
                              <!--<h5 class="media-heading"><a href="<?php echo $url; ?>"> <?php if($ads->price)echo 'USD '.$ads->price; ?></a></h5>-->
                            </div>
                             </div>
                                  <div class="xx12 col-md-2 col-xs-2 col-sm-12">
                            <?php if($ads->school_imag!=""){ ?>
                              <a class="thumbnail pull-left"  href="<?php echo base_url();?>index.php/classified_ads/ads/?school_name=<?php echo $ads->school_name; ?>" style="margin-top: 50%;">
                              <img class="media-object w100" style="max-height: 180px;" src="<?php echo base_url().$ads->school_imag; ?>" /></a>
                           
                                    
                                    <div class="clearfix"></div>
                                    <?php }?>
                                    </div>
                          </div>
                           
                        </td>

                    </tr>
                    <?php
                    }
                }else{ echo "<tr><td align='center'>No Results Found</td></tr>";}
                ?>
                </tbody>
                
             
              </table>
              
               <div class="col-lg-12" style="text-align: center;">
              <?php echo $pagination;?>
            </div>
              <?php if((isset($_GET['s']) || isset($_GET['isbn']))){
            ?>
            <div id="livesearch"><table class=" list-detail "><tbody id="livesearch"><tr><td><img src="<?php echo base_url();?>images/1445974136-loading.gif" /></td></tr></tbody></table></div>
             <?php }?>
              </table>
              
            </div>
           
          </div>
        </div><form id="filter_form">               
             <textarea name="main_url" id="main_url" style="display:none;" ></textarea>   
             <input type="hidden" value="" name="sec_page" />
   </form>
<?php if((isset($_GET['s']) || isset($_GET['isbn'])) ){
            ?>
            
              <script >var chrsz   = 8;   /* bits per input character. 8 - ASCII; 16 - Unicode      */
var hexcase = 0;    /* hex output format. 0 - lowercase; 1 - uppercase        */
var b64pad  = "=";  /* base-64 pad character. "=" for strict RFC compliance   */

function safe_add (x, y) {
  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
  return (msw << 16) | (lsw & 0xFFFF);
}

function S (X, n) {return ( X >>> n ) | (X << (32 - n));}

function R (X, n) {return ( X >>> n );}

function Ch(x, y, z) {return ((x & y) ^ ((~x) & z));}

function Maj(x, y, z) {return ((x & y) ^ (x & z) ^ (y & z));}

function Sigma0256(x) {return (S(x, 2) ^ S(x, 13) ^ S(x, 22));}

function Sigma1256(x) {return (S(x, 6) ^ S(x, 11) ^ S(x, 25));}

function Gamma0256(x) {return (S(x, 7) ^ S(x, 18) ^ R(x, 3));}

function Gamma1256(x) {return (S(x, 17) ^ S(x, 19) ^ R(x, 10));}

function Sigma0512(x) {return (S(x, 28) ^ S(x, 34) ^ S(x, 39));}

function Sigma1512(x) {return (S(x, 14) ^ S(x, 18) ^ S(x, 41));}

function Gamma0512(x) {return (S(x, 1) ^ S(x, 8) ^ R(x, 7));}

function Gamma1512(x) {return (S(x, 19) ^ S(x, 61) ^ R(x, 6));}

function core_sha256 (m, l) {
    var K = new Array(0x428A2F98,0x71374491,0xB5C0FBCF,0xE9B5DBA5,0x3956C25B,0x59F111F1,0x923F82A4,0xAB1C5ED5,0xD807AA98,0x12835B01,0x243185BE,0x550C7DC3,0x72BE5D74,0x80DEB1FE,0x9BDC06A7,0xC19BF174,0xE49B69C1,0xEFBE4786,0xFC19DC6,0x240CA1CC,0x2DE92C6F,0x4A7484AA,0x5CB0A9DC,0x76F988DA,0x983E5152,0xA831C66D,0xB00327C8,0xBF597FC7,0xC6E00BF3,0xD5A79147,0x6CA6351,0x14292967,0x27B70A85,0x2E1B2138,0x4D2C6DFC,0x53380D13,0x650A7354,0x766A0ABB,0x81C2C92E,0x92722C85,0xA2BFE8A1,0xA81A664B,0xC24B8B70,0xC76C51A3,0xD192E819,0xD6990624,0xF40E3585,0x106AA070,0x19A4C116,0x1E376C08,0x2748774C,0x34B0BCB5,0x391C0CB3,0x4ED8AA4A,0x5B9CCA4F,0x682E6FF3,0x748F82EE,0x78A5636F,0x84C87814,0x8CC70208,0x90BEFFFA,0xA4506CEB,0xBEF9A3F7,0xC67178F2);
    var HASH = new Array(0x6A09E667, 0xBB67AE85, 0x3C6EF372, 0xA54FF53A, 0x510E527F, 0x9B05688C, 0x1F83D9AB, 0x5BE0CD19);
    var W = new Array(64);
    var a, b, c, d, e, f, g, h, i, j;
    var T1, T2;

    /* append padding */
    m[l >> 5] |= 0x80 << (24 - l % 32);
    m[((l + 64 >> 9) << 4) + 15] = l;

    for ( var i = 0; i<m.length; i+=16 ) {
        a = HASH[0];
        b = HASH[1];
        c = HASH[2];
        d = HASH[3];
        e = HASH[4];
        f = HASH[5];
        g = HASH[6];
        h = HASH[7];

        for ( var j = 0; j<64; j++) {
            if (j < 16) W[j] = m[j + i];
            else W[j] = safe_add(safe_add(safe_add(Gamma1256(W[j - 2]), W[j - 7]), Gamma0256(W[j - 15])), W[j - 16]);

            T1 = safe_add(safe_add(safe_add(safe_add(h, Sigma1256(e)), Ch(e, f, g)), K[j]), W[j]);
            T2 = safe_add(Sigma0256(a), Maj(a, b, c));

            h = g;
            g = f;
            f = e;
            e = safe_add(d, T1);
            d = c;
            c = b;
            b = a;
            a = safe_add(T1, T2);
        }
        
        HASH[0] = safe_add(a, HASH[0]);
        HASH[1] = safe_add(b, HASH[1]);
        HASH[2] = safe_add(c, HASH[2]);
        HASH[3] = safe_add(d, HASH[3]);
        HASH[4] = safe_add(e, HASH[4]);
        HASH[5] = safe_add(f, HASH[5]);
        HASH[6] = safe_add(g, HASH[6]);
        HASH[7] = safe_add(h, HASH[7]);
    }
    return HASH;
}

function core_sha512 (m, l) {
    var K = new Array(0x428a2f98d728ae22, 0x7137449123ef65cd, 0xb5c0fbcfec4d3b2f, 0xe9b5dba58189dbbc, 0x3956c25bf348b538, 0x59f111f1b605d019, 0x923f82a4af194f9b, 0xab1c5ed5da6d8118, 0xd807aa98a3030242, 0x12835b0145706fbe, 0x243185be4ee4b28c, 0x550c7dc3d5ffb4e2, 0x72be5d74f27b896f, 0x80deb1fe3b1696b1, 0x9bdc06a725c71235, 0xc19bf174cf692694, 0xe49b69c19ef14ad2, 0xefbe4786384f25e3, 0x0fc19dc68b8cd5b5, 0x240ca1cc77ac9c65, 0x2de92c6f592b0275, 0x4a7484aa6ea6e483, 0x5cb0a9dcbd41fbd4, 0x76f988da831153b5, 0x983e5152ee66dfab, 0xa831c66d2db43210, 0xb00327c898fb213f, 0xbf597fc7beef0ee4, 0xc6e00bf33da88fc2, 0xd5a79147930aa725, 0x06ca6351e003826f, 0x142929670a0e6e70, 0x27b70a8546d22ffc, 0x2e1b21385c26c926, 0x4d2c6dfc5ac42aed, 0x53380d139d95b3df, 0x650a73548baf63de, 0x766a0abb3c77b2a8, 0x81c2c92e47edaee6, 0x92722c851482353b, 0xa2bfe8a14cf10364, 0xa81a664bbc423001, 0xc24b8b70d0f89791, 0xc76c51a30654be30, 0xd192e819d6ef5218, 0xd69906245565a910, 0xf40e35855771202a, 0x106aa07032bbd1b8, 0x19a4c116b8d2d0c8, 0x1e376c085141ab53, 0x2748774cdf8eeb99, 0x34b0bcb5e19b48a8, 0x391c0cb3c5c95a63, 0x4ed8aa4ae3418acb, 0x5b9cca4f7763e373, 0x682e6ff3d6b2b8a3, 0x748f82ee5defb2fc, 0x78a5636f43172f60, 0x84c87814a1f0ab72, 0x8cc702081a6439ec, 0x90befffa23631e28, 0xa4506cebde82bde9, 0xbef9a3f7b2c67915, 0xc67178f2e372532b, 0xca273eceea26619c, 0xd186b8c721c0c207, 0xeada7dd6cde0eb1e, 0xf57d4f7fee6ed178, 0x06f067aa72176fba, 0x0a637dc5a2c898a6, 0x113f9804bef90dae, 0x1b710b35131c471b, 0x28db77f523047d84, 0x32caab7b40c72493, 0x3c9ebe0a15c9bebc, 0x431d67c49c100d4c, 0x4cc5d4becb3e42b6, 0x597f299cfc657e2a, 0x5fcb6fab3ad6faec, 0x6c44198c4a475817);
    var HASH = new Array(0x6a09e667f3bcc908, 0xbb67ae8584caa73b, 0x3c6ef372fe94f82b, 0xa54ff53a5f1d36f1, 0x510e527fade682d1, 0x9b05688c2b3e6c1f, 0x1f83d9abfb41bd6b, 0x5be0cd19137e2179);
    var W = new Array(80);
    var a, b, c, d, e, f, g, h, i, j;
    var T1, T2;

}

function str2binb (str) {
  var bin = Array();
  var mask = (1 << chrsz) - 1;
  for(var i = 0; i < str.length * chrsz; i += chrsz)
    bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (24 - i%32);
  return bin;
}

function binb2str (bin) {
  var str = "";
  var mask = (1 << chrsz) - 1;
  for(var i = 0; i < bin.length * 32; i += chrsz)
    str += String.fromCharCode((bin[i>>5] >>> (24 - i%32)) & mask);
  return str;
}

function binb2hex (binarray) {
  var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
  var str = "";
  for(var i = 0; i < binarray.length * 4; i++)
  {
    str += hex_tab.charAt((binarray[i>>2] >> ((3 - i%4)*8+4)) & 0xF) +
           hex_tab.charAt((binarray[i>>2] >> ((3 - i%4)*8  )) & 0xF);
  }
  return str;
}

function binb2b64 (binarray) {
  var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  var str = "";
  for(var i = 0; i < binarray.length * 4; i += 3)
  {
    var triplet = (((binarray[i   >> 2] >> 8 * (3 -  i   %4)) & 0xFF) << 16)
                | (((binarray[i+1 >> 2] >> 8 * (3 - (i+1)%4)) & 0xFF) << 8 )
                |  ((binarray[i+2 >> 2] >> 8 * (3 - (i+2)%4)) & 0xFF);
    for(var j = 0; j < 4; j++)
    {
      if(i * 8 + j * 6 > binarray.length * 32) str += b64pad;
      else str += tab.charAt((triplet >> 6*(3-j)) & 0x3F);
    }
  }
  return str;
}

function hex_sha256(s){return binb2hex(core_sha256(str2binb(s),s.length * chrsz));}
function b64_sha256(s){return binb2b64(core_sha256(str2binb(s),s.length * chrsz));}
function str_sha256(s){return binb2str(core_sha256(str2binb(s),s.length * chrsz));} function encodeNameValuePairs(pairs) {
        for (var i = 0; i < pairs.length; i++) {
          var name = "";
          var value = "";
          
          var pair = pairs[i];
          var index = pair.indexOf("=");

          // take care of special cases like "&foo&", "&foo=&" and "&=foo&" 
          if (index == -1) {
            name = pair;
          } else if (index == 0) {
            value = pair;
          } else {
            name = pair.substring(0, index);
            if (index < pair.length - 1) {
              value = pair.substring(index + 1);
            }
          }
          
	  // decode and encode to make sure we undo any incorrect encoding
          name = encodeURIComponent(decodeURIComponent(name));

	  value = value.replace(/\+/g, "%20");
          value = encodeURIComponent(decodeURIComponent(value));

          pairs[i] = name + "=" + value;
        }
        
        return pairs;
      }
      
      function cleanupRequest(pairs) {
        var haveTimestamp = false;
	var haveAwsId = false;
        var accessKeyId =  getAccessKeyId();
        
        var nPairs = pairs.length;
        var i = 0;
        while (i < nPairs) {
          var p = pairs[i];
          if (p.search(/^Timestamp=/) != -1) {
            haveTimestamp = true;
          } else if (p.search(/^(AWSAccessKeyId|SubscriptionId)=/) != -1) {
            pairs.splice(i, 1, "AWSAccessKeyId=" + accessKeyId);
	    haveAwsId = true;
          } else if (p.search(/^Signature=/) != -1) {
            pairs.splice(i, 1);
            i--;
            nPairs--;
          }
          i++;
        }

        if (!haveTimestamp) {
          pairs.push("Timestamp=" + getNowTimeStamp());
        }

	if (!haveAwsId) {
	  pairs.push("AWSAccessKeyId=" + accessKeyId);
	}
        return pairs;
      }
      
      function sign(secret, message) {
        var messageBytes = str2binb(message);
        var secretBytes = str2binb(secret);
        
        if (secretBytes.length > 16) {
            secretBytes = core_sha256(secretBytes, secret.length * chrsz);
        }
        
        var ipad = Array(16), opad = Array(16);
        for (var i = 0; i < 16; i++) { 
            ipad[i] = secretBytes[i] ^ 0x36363636;
            opad[i] = secretBytes[i] ^ 0x5C5C5C5C;
        }

        var imsg = ipad.concat(messageBytes);
        var ihash = core_sha256(imsg, 512 + message.length * chrsz);
        var omsg = opad.concat(ihash);
        var ohash = core_sha256(omsg, 512 + 256);
        
        var b64hash = binb2b64(ohash);
        var urlhash = encodeURIComponent(b64hash);
        
        return urlhash;
      }
      
      Date.prototype.toISODate =
	      new Function("with (this)\n    return " +
		 "getFullYear()+'-'+addZero(getMonth()+1)+'-'" +
		 "+addZero(getDate())+'T'+addZero(getHours())+':'" +
		 "+addZero(getMinutes())+':'+addZero(getSeconds())+'.000Z'");

      function addZero(n) {
	  return ( n < 0 || n > 9 ? "" : "0" ) + n;
      }

      function getNowTimeStamp() {
	  var time = new Date();
	  var gmtTime = new Date(time.getTime() + (time.getTimezoneOffset() * 60000));
	  return gmtTime.toISODate() ;
      }

      function getAccessKeyId() {
          return 'AKIAIZC6XUFAZLC6ZIAA';
      }
      
      function getSecretAccessKey() {
          return '3PtG8hodPeOejFuMbbwmRi6iphHO5ZI1xiW+Ntpf';        
      }
	  function go_url(){
		 //alert(decodeEntities(document.getElementById('main_url').innerHTML));
	 window.location.href = decodeEntities(document.getElementById('main_url').innerHTML);
		  }
		  function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
}




	


   
       <?php if(isset($_GET['s'])){ ?> 
	        var unsignedUrl = 'http://webservices.amazon.com/onca/xml?Service=AWSECommerceService&Version=2009-03-31&Operation=ItemSearch&SearchIndex=Books&AssociateTag=textbookpit-20&ResponseGroup=Images,ItemAttributes';
unsignedUrl=unsignedUrl+'&Keywords=<?php  echo $_GET['s']; ?>';
<?php }?>
<?php if(isset($_GET['isbn'])){ ?> 
var unsignedUrl = 'http://webservices.amazon.com/onca/xml?Service=AWSECommerceService&Version=2009-03-31&Operation=ItemLookup&AssociateTag=textbookpit-20&ResponseGroup=Images,ItemAttributes';
unsignedUrl=unsignedUrl+'&ItemId=<?php  echo $_GET['isbn']; ?>';
<?php }?>
	var lines = unsignedUrl.split("\n");
	unsignedUrl = "";
	for (var i in lines) { unsignedUrl += lines[i]; }

        // find host and query portions
        var urlregex = new RegExp("^http:\\/\\/(.*)\\/onca\\/xml\\?(.*)$");
        var matches = urlregex.exec(unsignedUrl);

	

        var host = matches[1].toLowerCase();
        var query = matches[2];

        // split the query into its constituent parts
        var pairs = query.split("&");

        // remove signature if already there
        // remove access key id if already present 
        //  and replace with the one user provided above
        // add timestamp if not already present
        pairs = cleanupRequest(pairs);

        // show it
      //  document.getElementById("NameValuePairs").value = pairs.join("\n");
        
        // encode the name and value in each pair
        pairs = encodeNameValuePairs(pairs);
        
        // sort them and put them back together to get the canonical query string
        pairs.sort();
       // document.getElementById("OrderedPairs").value = pairs.join("\n");

        var canonicalQuery = pairs.join("&");
        var stringToSign = "GET\n" + host + "\n/onca/xml\n" + canonicalQuery;

        // calculate the signature
        var secret = getSecretAccessKey();
        var signature = sign(secret, stringToSign);
        
        // assemble the signed url
        var signedUrl = "http://" + host + "/onca/xml?" + canonicalQuery + "&Signature=" + signature;
        
  
	   document.getElementById('main_url').innerHTML=signedUrl;
	   $.ajax({
		url: '<?php echo base_url();?>index.php/classified_ads/search_module_amozon/',
		type: 'get',
		dataType: 'html',
		data: $("#filter_form").serialize(),
		
		success: function(json) {
		

			document.getElementById("livesearch").innerHTML=json;
			
		}
	});
		
		

  

</script>
            <?php } ?><script>
                $(document).ready(function(){
		
		document.getElementById('left').innerHTML=document.getElementById('right').innerHTML+document.getElementById('left').innerHTML;
  
});  
           
    

      $('#owl-demo').owlCarousel({
	items: 3,
	autoPlay: 3000,
	navigation: false,
	navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
	pagination: true,
	   
    itemsCustom : false,
    itemsDesktop : [1199,2],
    itemsDesktopSmall : [980,2],
    itemsTablet: [768,2],
    itemsTabletSmall: false,
    itemsMobile : [479,2],
    singleItem : false,
    itemsScaleUp : false,
});

    </script>
       