app.component('box_cards', {
    props:{
        cards: {
            type:Array,
            required:true,
        },
        header: {
            type:String,
            default:'none',
        },
    },
    data() {
      return {
        sty: {
            backgroundColor: '#343a40e0', // grey color
            padding: '20px',
            borderRadius: '10px',
            marginTop: '20%',
            marginLeft:'20%'
        },
        oldIndex: 0,
      }
    },
    methods: {
        show_season(id) {
            document.getElementById(this.oldIndex).style.display = "none";
            document.getElementById(id).style.display = "block";
            this.oldIndex = id;
        }
    },
    template:`
    <div class="container mt-4" :style="sty">
        <h3 v-if="header !='none'" class="text-white text-center p-3">{{header}}</h3>
        <div class="row">
            <a v-for="(card,i) in cards" :key="i" class="EP_card text-dark mb-2" :href="card.link" @click="show_season(i)">
            {{card.content}}
            </a>
        </div>
        <slot></slot>
    </div>
    `,
})