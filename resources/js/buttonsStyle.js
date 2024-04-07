// resources/js/buttonStyle.js

module.exports = {
    buttons: {
        ".button-validate": {
            padding: ".5rem 1rem",
            borderRadius: ".25rem",
            fontWeight: "700",
            backgroundColor: "#10B981",
            color: "white",
            "&:hover": {
                backgroundColor: "#059669"
            }
        },
        '.button-cancel': {
            padding: ".5rem 1rem",
            borderRadius: ".25rem",
            fontWeight: "700",
            color: 'white',
            backgroundColor: '#EF4444',
            '&:hover':{
                backgroundColor:'#DC2626'
            }
        },
        '.button-modify': {
            padding: ".5rem 1rem",
            borderRadius: ".25rem",
            fontWeight: "700",
            color: 'black',
            backgroundColor: '#fcd34d',
            "&:hover":{
                backgroundColor: '#ae902c'
            }
        },
    }
};
