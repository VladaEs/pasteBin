import PasteOptions from "../PasteOptions/PasteOptions";
import TagsInput from "./Tags/TagsInput";
import PasteExpiration from "./pasteExpiration/PasteExpiration";
import PastePrivacy from "./PastePrivacy/PastePrivacy";
import InputPassword from "./InputPassword/InputPassword";
import InputPasteName from "./InputPasteName/InputPasteName";
import FormRowWrapper from "./FormRowWrapper/FormRowWrapper";
import { useForm } from "react-hook-form";
import { useEffect, useState } from "react";
import InputWrapper from "./inputWrapper/InputWrapper";
import fetchData from "@/components/CustomHooks/serverSideFetch";


const FormPaste =({getRegister})=>{
    const {register, handleSubmit, setValue, formState: {errors}}=useForm();
    const [formoptions, SetFormOptions] = useState({});
    const onSubmit = (data, event) => {
        if(data.TextAreaValue == undefined || data.TextAreaValue.length<=1 || event.keyCode == 13){
            event.preventDefault();
            return false;
        }
        data["user_id"] = 1;
        console.log(data);

        // fetch(process.env.API_PATH +"/createpaste")
        // .then((responce) => responce.json())
        // .then((responce)=> console.log(responce));

        fetch(process.env.API_PATH + "/createpaste", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',  
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),  
            cache: 'default'  
        })
        .then((responce) => responce.json())
        .then((responce)=> console.log(responce));
    }



    useEffect(()=>{
        getRegister(register('TextAreaValue'), setValue)
        fetchData("/pastesettings");


    },[]);



    return(

        <form className={`wrapper w-full flex flex-col gap-1`} onSubmit={handleSubmit(onSubmit)} >
            <PasteOptions register= {register('Category')}/>
            <TagsInput register= {register('TagsInput')} setValue={setValue}/>
            <PasteExpiration register= {register('PasteExpiration')}/>
            <PastePrivacy register= {register('Privacy')}/>
            <InputPassword register= {register('Password')}/>
            <InputPasteName register={register('PasteName', { required: "Paste name is required" })}/>
            <p className="text-orange-700">{errors.PasteName?.message}</p>
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