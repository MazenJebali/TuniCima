app.component('table_component', {
    props:{
        header: {
          type:String,
          default:"",
        },
        headerdata: {
            type:Array,
            default: [],
        },
        bodydata: {
            type:Array,
            default: [],
        }
    },
    data() {
      return {
      }
    },
    template:`
    <div class="container mt-5">
    <h3 class="text-center">{{header}}</h3>
    <br>
    

    <table class="table table-hover">
        <tr class="table-primary">
          <th scope="col" v-for="(head,i) in headerdata" :key="i">{{head}}</th>
        </tr>

        <tr v-for="(row,i) in bodydata" :key="i" scope="row">
          <td v-for="(rowdata,i) in row" :key="i">{{rowdata}}</td>
        </tr>

        <slot></slot>
    </table>
    </div>
      `,
  })