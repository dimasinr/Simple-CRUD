import React from 'react';
import ReactDOM from 'react-dom';
import swal from 'sweetalert';

function Delete(props) {
    const destroy = (e) => {
        const afterDeleted = e.currentTarget.parentNode.parentNode.parentNode
    swal("Delete this band ?",{
        buttons : ["No","Yes"]
    }).then((value) => {
        if (value == true) {
            axios.delete(props.endpoint).then((response) => {
                afterDeleted.remove()
            })
        }
    });   
}
    return (
        <button onClick={destroy} className="btn btn-danger btn-sm"><i className="far fa-trash-alt"></i></button>
    );
}

export default Delete;

if (document.querySelectorAll('.delete')) {
    const deleteNodes = document.querySelectorAll('.delete')
    deleteNodes.forEach((item) =>{
    var endpoint =
    ReactDOM.render(<Delete endpoint={item.getAttribute('endpoint')}/>,item);
    })
}
