import styles from './PasteExpiration.module.css'
import FormRowWrapper from '../FormRowWrapper/FormRowWrapper';
import InputWrapper from '../inputWrapper/InputWrapper';
import PasteOptionSpan  from '../../PasteOptions/PasteOptionSpan/PasteOptionSpan';

const PasteExpiration =(props)=>{

    return(
    <FormRowWrapper>
        <div className="  text-white flex-1"><PasteOptionSpan>Paste Expiration</PasteOptionSpan></div>
        <InputWrapper>
        
        <select id="category" {...props.register} className=" w-full gap-5 bg-gray-50 border border-gray-300 dark:text-neutral-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-neutral-900 dark:border-neutral-700">
                <option>Never</option>
                <option>Burn After read</option>
                <option>10 minutes</option>
                <option>1 hour</option>
                <option>1 day</option>
                <option>1 week</option>
                <option>2 weeks</option>
                <option>1 month</option>
             </select>
        
        
        </InputWrapper>
    </FormRowWrapper>

    )



}
export default PasteExpiration;