module.exports = {
    inputs:{
        '.input-text':{
            display: 'block',
            marginTop: '.25rem',
            borderRadius: '.375rem',
            borderColor: '#D1D5DB',
            width: '100%',
            boxShadow : '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
            '&:focus':{
                borderColor: '#6366f1',
            }
        },
        '.input-checkbox':{
            display: 'block',
            marginTop: '.25rem',
            borderColor: '#D1D5DB',
            boxShadow : '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
            '&:hover':{
                borderColor: '#6366f1',
            }

        }
    }
}
