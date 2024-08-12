app.component('popup', {
    props:{
        id: {
            type:String,
            required:true,
        },
        header: {
            type:String,
            default: "pop up",
        },
        content: {
            type:String,
            default: "pop up content",
        },
    },
    data() {
      return {
      }
    },
    template:`
    <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!--HEADER-->
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">{{header}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--BODY-->
        <div class="modal-body">
          {{content}}
        </div>
        <!--FOOTER-->
        <div class="modal-footer">
            <slot></slot>
        </div>

      </div>
    </div>
    </div>
      `,
  })