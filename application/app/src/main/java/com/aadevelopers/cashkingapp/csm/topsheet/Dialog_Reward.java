package com.aadevelopers.cashkingapp.csm.topsheet;

import static com.aadevelopers.cashkingapp.helper.PrefManager.redeem_package;

import android.content.Context;
import android.os.Bundle;

import androidx.fragment.app.DialogFragment;

import android.text.InputType;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.aadevelopers.cashkingapp.R;
import com.aadevelopers.cashkingapp.helper.AppController;

public class Dialog_Reward extends DialogFragment {
    View root_view;
    EditText pd,username;
    TextView value,note;
    ImageView logo;
    LinearLayout close,redeem;
    String p_details;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        root_view = inflater.inflate(R.layout.dialog__reward, container, false);

        pd = root_view.findViewById(R.id.email_input);
        username = root_view.findViewById(R.id.username_input);
        logo = root_view.findViewById(R.id.logo);
        close = root_view.findViewById(R.id.close);
        redeem = root_view.findViewById(R.id.redeem);
        note = root_view.findViewById(R.id.note);
        value = root_view.findViewById(R.id.value);

        String coins = getArguments().getString("coins");
        String id = getArguments().getString("id");
        String uri = getArguments().getString("uri");
        String symbol = getArguments().getString("symbol");
        String amount = getArguments().getString("amount");
        String type = getArguments().getString("type").trim();
        String hint = getArguments().getString("hint");
        String more = getArguments().getString("more");
        String amount_id = getArguments().getString("amount_id");
        pd.setHint(hint);
        if (type.equals("binance"))
        {
            pd.setHint("Email");
            username.setHint("Username");
            username.setVisibility(View.VISIBLE);
            pd.setInputType(InputType.TYPE_TEXT_VARIATION_EMAIL_ADDRESS);
            username.setInputType(InputType.TYPE_CLASS_TEXT);
        }
        else if (type.equals("email"))
        {   pd.setText(AppController.getInstance().getEmail());
            pd.setEnabled(false);
            pd.setInputType(InputType.TYPE_TEXT_VARIATION_EMAIL_ADDRESS);
            username.setVisibility(View.GONE);
        }else if (type.equals("phone"))
        {
            pd.setEnabled(true);
            pd.setInputType(InputType.TYPE_CLASS_PHONE);
            username.setVisibility(View.GONE);
        }else if (type.equals("number"))
        {
            pd.setEnabled(true);
            pd.setInputType(InputType.TYPE_CLASS_NUMBER);
            username.setVisibility(View.GONE);
        }else if (type.equals("text"))
        {
            pd.setEnabled(true);
            pd.setInputType(InputType.TYPE_CLASS_TEXT);
            username.setVisibility(View.GONE);
        } else {
            username.setVisibility(View.GONE);
        }
        value.setText(coins+" = "+symbol+" "+amount);

        Glide.with(getContext()).load(uri)
                .apply(new RequestOptions().placeholder(R.mipmap.ic_launcher))
                .into(logo);

        close.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dismiss();
            }
        });
        note.setText(more);

        Context contextt = getContext();

        redeem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                p_details = String.valueOf(pd.getText());
                if (type.equals("binance"))
                {
                    String email = pd.getText().toString();
                    String user = username.getText().toString();
                    if(email.length()>0 && user.length()>0)
                    {
                        p_details = email+"|"+user;
                        dismiss();
                        redeem_package(contextt,id,p_details,amount_id);
                    }else {
                        if(email.length()==0) pd.setError("Error");
                        if(user.length()==0) username.setError("Error");
                    }
                }
                else if (type.equals("email"))
                {
                    dismiss();
                    redeem_package(contextt,id,p_details,amount_id);
                }else if (type.equals("phone"))
                {
                    if (pd.length()>=10)
                    {
                        dismiss();
                        redeem_package(contextt,id,p_details,amount_id);
                    }else
                    {
                        pd.setError("Enter valid number");
                    }
                }else if (type.equals("number"))
                {
                    if (pd.length()>=1)
                    {
                        dismiss();
                        redeem_package(contextt,id,p_details,amount_id);
                    }else
                    {
                        dismiss();
                        pd.setError("Error");
                    }
                }else if (type.equals("text"))
                {
                    if (pd.length()>0)
                    {
                        dismiss();
                        redeem_package(contextt,id,p_details,amount_id);
                    }else
                    {
                        pd.setError("Error");
                    }
                }else
                {
                    if (pd.length()>0)
                    {
                        dismiss();
                        redeem_package(contextt,id,p_details,amount_id);
                    }else
                    {
                        pd.setError("Error");
                    }
                }
            }
        });

        return root_view;
    }
}