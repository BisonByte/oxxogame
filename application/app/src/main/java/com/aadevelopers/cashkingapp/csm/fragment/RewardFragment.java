package com.aadevelopers.cashkingapp.csm.fragment;

import static android.content.ContentValues.TAG;
import static com.aadevelopers.cashkingapp.helper.Constatnt.ACCESS_KEY;
import static com.aadevelopers.cashkingapp.helper.Constatnt.ACCESS_Value;
import static com.aadevelopers.cashkingapp.helper.Constatnt.Base_Url;
import static com.aadevelopers.cashkingapp.helper.Constatnt.REWARD;
import static com.aadevelopers.cashkingapp.helper.PrefManager.user_points;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.aadevelopers.cashkingapp.AdsManager;
import com.aadevelopers.cashkingapp.R;
import com.aadevelopers.cashkingapp.csm.TransActivity;
import com.aadevelopers.cashkingapp.csm.adapter.Reward_adapter;
import com.aadevelopers.cashkingapp.csm.model.Reward_model;
import com.aadevelopers.cashkingapp.helper.AppController;
import com.aadevelopers.cashkingapp.helper.ContextExtensionKt;
import com.aadevelopers.cashkingapp.helper.JsonRequest;
import com.aadevelopers.cashkingapp.helper.ShimmerExtensionKt;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.facebook.shimmer.ShimmerFrameLayout;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class RewardFragment extends Fragment {

    private View root_view;
    RecyclerView reward_list;
    Reward_adapter reward_adapter;
    private List<Reward_model> reward_listt = new ArrayList<>();
    ProgressBar progressBar;
    LinearLayout trans;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        root_view = inflater.inflate(R.layout.fragment_reward, container, false);

        reward_list = root_view.findViewById(R.id.reward_list);
        progressBar = root_view.findViewById(R.id.progressBar);
        trans = root_view.findViewById(R.id.trans);
        trans.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getContext(), TransActivity.class);
                startActivity(i);
            }
        });
        TextView points = root_view.findViewById(R.id.points);
        points.setText("0");

        user_points(points);

        setupBinance();
        AdsManager.loadBannerAd(requireActivity(), root_view.findViewById(R.id.banner_ad_container));
        return root_view;
    }


    public void getlist() {
        JsonRequest stringRequest = new JsonRequest(Request.Method.POST,
                Base_Url, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                VolleyLog.d(TAG, "Response: " + response.toString());
                if (response != null) {
                    parseJsonFeed(response);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getActivity(), error.getMessage(), Toast.LENGTH_LONG).show();
            }
        }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<String, String>();
                params.put(ACCESS_KEY, ACCESS_Value);
                params.put(REWARD, REWARD);
                params.put("id", AppController.getInstance().getId());
                return params;
            }
        };
        // Adding request to volley request queue
        AppController.getInstance().addToRequestQueue(stringRequest);
    }


    private void parseJsonFeed(JSONObject response) {
        ShimmerFrameLayout shimmer = root_view.findViewById(R.id.shimmer);
        try {
            TextView min = root_view.findViewById(R.id.min);
            progressBar.setMax(response.getInt("minimum"));
            int coi = Integer.parseInt(AppController.getInstance().getPoints());
            progressBar.setProgress(coi);
            min.setText("" + response.getInt("minimum"));

            JSONArray feedArray = response.getJSONArray("data");
            reward_listt.clear();

            for (int i = 0; i < feedArray.length(); i++) {
                JSONObject feedObj = (JSONObject) feedArray.get(i);
                JSONArray array = (feedObj.getJSONArray("amounts"));
                Integer id = (feedObj.getInt("id"));
                String name = (feedObj.getString("name"));
                String image = (feedObj.getString("image"));
                String symbol = (feedObj.getString("symbol"));
                String hint = (feedObj.getString("hint"));
                String input_type = (feedObj.getString("input_type"));
                Integer minimum = (feedObj.getInt("minimum"));
                String details = (feedObj.getString("details"));
                String arr = array.toString();

                Reward_model item = new Reward_model(name, image, symbol, hint, input_type, id, details, minimum, arr);
                reward_listt.add(item);

            }

            reward_adapter = new Reward_adapter(reward_listt, getActivity());

            reward_list.setHasFixedSize(true);
            reward_list.setLayoutManager(new LinearLayoutManager(getContext()));
            reward_list.setAdapter(reward_adapter);

            ShimmerExtensionKt.safelyHide(shimmer);
            reward_list.setVisibility(View.VISIBLE);

        } catch (JSONException e) {
            e.printStackTrace();
            ContextExtensionKt.showLongToast(getContext(), e.getMessage());
            ShimmerExtensionKt.safelyHide(shimmer);
        }
    }

    private void setupBinance() {
        reward_listt.clear();
        try {
            JSONArray arr = new JSONArray();
            JSONObject ob = new JSONObject();
            ob.put("id", 1);
            ob.put("amount", "10");
            ob.put("coins", "1000");
            arr.put(ob);

            Reward_model item = new Reward_model(
                    "Binance",
                    String.valueOf(R.drawable.binance_logo),
                    "$",
                    "Binance Email",
                    "binance",
                    1,
                    "Provide your Binance email and username",
                    0,
                    arr.toString());
            reward_listt.add(item);
        } catch (JSONException e) {
            e.printStackTrace();
        }

        reward_adapter = new Reward_adapter(reward_listt, getActivity());
        reward_list.setHasFixedSize(true);
        reward_list.setLayoutManager(new LinearLayoutManager(getContext()));
        reward_list.setAdapter(reward_adapter);
    }


}