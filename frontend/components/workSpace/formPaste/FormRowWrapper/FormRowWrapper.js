import styles from './FormRowWrapper.module.css'

const FormRowWrapper= (props)=>{

    return(
        <div className={`flex flex-row justify-between items-center w-full`}>
            {props.children}
        </div>
    )

}
export default FormRowWrapper;