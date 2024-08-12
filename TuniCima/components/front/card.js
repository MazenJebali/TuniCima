app.component('card', {
    props:{
      style: {
        type:Object,
        default: {},
      },
      class_name: {
        type:String,
        default: '',
      }
    },
    data() {
      return {
      }
    },
    template:`
    <div :class="class_name" :style="style">

      <slot></slot>
    
    </div>
      `,
  })