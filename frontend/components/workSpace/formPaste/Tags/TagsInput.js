import styles from './TagsInput.module.css'

import FormRowWrapper from "../FormRowWrapper/FormRowWrapper";

import PasteOptionSpan from "../../PasteOptions/PasteOptionSpan/PasteOptionSpan";
import InputWrapper from "../inputWrapper/InputWrapper";
import { useState, useRef } from "react";
const TagsInput=({register, setValue, validationOptions})=>{
    
    const [tags, SetTags]= useState([]);
    const [currentTagVal, SetCurrentTagVal] = useState('');
    const tagsInputField = useRef();
    const hiddenField = useRef();

    const makeInputActive=()=>{
        tagsInputField.current.focus();
    }

    const checkKeyPressed = (event) => {
        if (event.key === 'Enter') {
            if(currentTagVal.length == 0 || currentTagVal== "") return;
            SetTags((prevVal)=>(
                [...prevVal, currentTagVal]
                
            ))
            setValue('TagsInput', tags);
            
            SetCurrentTagVal('');
        }        
    }
    const deleteItemHandler = (event) => {
        let index = event.target.getAttribute('data-index');
        index = parseInt(index, 10);
        if (index < 0 || index >= tags.length) return; 
        SetTags((prevVal) => prevVal.filter((_, i) => i !== index));
      };

    const handleChange = (event) => {
        if (event.target.value.length < 20) {
            SetCurrentTagVal(event.target.value);
        }
    }
    return(
        <FormRowWrapper>
            <div className="  text-white flex-1 "><PasteOptionSpan>Tags:</PasteOptionSpan></div>
            <InputWrapper>
            <div className="w-full gap-5 bg-gray-50 border border-gray-300 dark:text-neutral-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-neutral-900 dark:border-neutral-700" 
            onClick={makeInputActive}
            >
                <ul className={`flex flex-row flex-wrap ${styles.tagsList}`}>
                    {tags.map((item, ind)=>(
                        <li key={ind} onClick={deleteItemHandler} data-index={ind}>{item}</li>
                    ))}
                    
                </ul>
                <input 
        type='text' 
        className={`${styles.inputField}`} 
        ref={tagsInputField} 
        onKeyDown={checkKeyPressed} 
        onChange={handleChange} 
        value={currentTagVal} 
    />
    <input type='hidden' {...register} {...validationOptions} ref={hiddenField}/>
            </div>
                </InputWrapper>
        </FormRowWrapper>
    )
}

export default TagsInput;