import PasteOptions from "../PasteOptions/PasteOptions";
import TagsInput from "./Tags/TagsInput";
import PasteExpiration from "./pasteExpiration/PasteExpiration";
import PastePrivacy from "./PastePrivacy/PastePrivacy";
import InputPassword from "./InputPassword/InputPassword";
import InputPasteName from "./InputPasteName/InputPasteName";
import FormRowWrapper from "./FormRowWrapper/FormRowWrapper";
import { useForm } from "react-hook-form";
import { useEffect } from "react";
import InputWrapper from "./inputWrapper/InputWrapper";
const FormPaste =({getRegister})=>{
    const {register, handleSubmit, setValue}=useForm();
    const onSubmit = (data, event) => {
        console.log(data);
        if(data.TextAreaValue == undefined || data.TextAreaValue.length<=1 ){
            event.preventDefault();
            console.log("wro");
            return false;
        }


        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
        
    }
    
    useEffect(()=>{
        getRegister(register('TextAreaValue'), setValue)
    },[])

   





    return(

        <form className={`wrapper w-full flex flex-col gap-1`} onSubmit={handleSubmit(onSubmit)} >
            <PasteOptions register= {register('Category')}/>
            <TagsInput register= {register('TagsInput')} setValue={setValue}/>
            <PasteExpiration register= {register('PasteExpiration')}/>
            <PastePrivacy register= {register('Privacy')}/>
            <InputPassword register= {register('Password')}/>
            <InputPasteName register= {register('PasteName')}/>
            <FormRowWrapper>
                <div className="text-white flex-1"></div>
                <InputWrapper>
                    <input type='submit' value={"submit"} className=" w-7/12 bg-transparent cursor-pointer hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"/>
                </InputWrapper>
            </FormRowWrapper>
        </form>

    )

}

export default FormPaste;