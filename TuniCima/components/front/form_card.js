app.component('form_card', {
    props:{
      action: {
        type: String,
        required: true,
      },
      method: {
        type:String,
        required: true,
      },
      inputs: {
        type:Array,
      },
      values: {
        type:Array,
        default: [],
      },
      toggles: {
        type:Array,
        default: [],
      },
      buttons: {
        type:Array,
        default: [{value:'submit',type:'submit',class:'btn btn-primary',id:"submitButton"}],
      },
      header: {
        type:String,
        default: 'Login',
      },
      datacheck: {
        type:Function,
        default: ()=> {return true;},
      }
    },
    data() {
      return {
      }
    },
    methods: {
      toggle(ID) {
        var inputType = document.getElementById(ID).attributes["type"]["value"];
        (inputType == 'password')? inputType = 'text' : inputType = 'password';
        document.getElementById(ID).attributes["type"]["value"] = inputType;
      },
    },
    template:`
    <div class="container">
    <div class="card login-card">
        <div class="card-header login-card-header" v-if="header!='none'"><h3>{{header}}</h3></div>
        <div class="card-body login-card-body">
        <!-- LOGIN FORUM -->
            <form :action="action" :method="method" enctype="multipart/form-data">
                <div v-for="(input,i) in inputs" :key="i" class="form-group">
                    <label :for="input.name">{{input.name}}</label>
                  <div class="input-group">
                    <input :type="input.type" :name="input.name" :id="input.name" class="form-control" placeholder="Input Field" :onkeyup="datacheck" autocomplete :value="values[i]">
                    <!--toggle button-->
                    <div  v-if="toggles.includes(input.name)" class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" @click="toggle(input.name)"><i class="bi bi-eye-fill"></i></button>
                    </div>
                  </div>
                </div>
                <button disabled=true v-for="(button,i) in buttons" :key="i" 
                :type="button.type" :id="button.id" :class="button.class">{{button.value}}</button>

                <slot></slot>

            </form>
        </div>
    </div>
    </div>
    `,
})