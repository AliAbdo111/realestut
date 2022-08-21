<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{Url('addForm/style.css')}}">
  <title>Form</title>  
      <body>	
        
        <!-- formulário de contacto utilizando html e css -->  
      
        <div class="contact_form">
      
          <div class="formulario">			
            <h1>Add Property</h1>
            <form method="POST" action="{{route('properities.store')}}" enctype="multipart/form-data" class="form" id="form1">				
      
              @csrf
                      <p>
                        <label for="nome" class="colocar_nome">Advertiser Name
                          <span class="obrigatorio">*</span>
                        </label>
                          <input type="text" name="name" id="nome" required="obrigatorio" placeholder="Appartment">
                      </p>
                    
                      <p>
                        <label for="email" class="colocar_email">Property Address
                          <span class="obrigatorio">*</span>
                        </label>
                          <input type="text" name="address"  required="obrigatorio" placeholder="Aswan">
                      </p>
                  
                      <p>
                        <label for="telefone" class="colocar_telefone">Property Price
                        </label>
                          <input type="text" name="price" id="telefone" required="obrigatorio" placeholder="$">
                      </p>		
                    
                      <p>
                        <label for="website" class="colocar_website">Image
                        </label>
                          <input type="file" name="image" required="obrigatorio" id="website" multiple>
                      </p>		
                    
                      <p>
                        <label for="assunto" class="colocar_asunto">Property Type
                          <span class="obrigatorio">*</span>
                        </label>
                          <input type="text" name="type" id="assunto" required="obrigatorio" placeholder="Flat">
                      </p>		

                      <p>
                        <label for="assunto" class="colocar_asunto">Number of Beds
                          <span class="obrigatorio">*</span>
                        </label>
                          <input type="number" name="number_of_beds" id="assunto" required="obrigatorio">
                      </p>		

                      <p>
                        <label for="beds" class="colocar_asunto">Wi-Fi Connection</label>
                       <select class="form-select" name="Wi-Fi" >
                      <option value="Yes" class="form-control">Yes</option>
                       <option value="2" class="form-control">No</option>
                       </select>
                      </p>


                      <p>
                        <label for="beds" class="colocar_asunto">Air Condiotioner</label> 
                       <select class="form-select" name="Air Conditioner">
                        <option value="Yes" class="form-control">Yes</option>
                        <option value="No" class="form-control">No</option>
                         </select>
                      </p>


                      <p>
                        <label for="assunto" class="colocar_asunto">Number of Rooms
                          <span class="obrigatorio">*</span>
                        </label>
                          <input type="number" name="number_of_rooms" id="assunto">
                      </p>		
                    
                      <p>
                        <label for="mensagem"  class="colocar_mensagem">Description
                          <span class="obrigatorio">*</span>
                        </label>                     
                        <textarea name="desc" class="texto_mensagem" id="mensagem" required="obrigatorio" placeholder="Type a short description about your ad here."></textarea> 
                        </p>	  								
                    
                      <button type="submit" name="submit" id="enviar"><p>submit</p></button>
                      {{-- <button type="submit" name="submit" id="enviar"><p>Back to dashboard</p></button> --}}
                </form>
          </div>	
        </div>
      
      </body>
      </html>
      
      
      <!-- created by magda pimentel, may 2017 -->
  </form>
</body>
</html>